<?php

namespace App\Controller;

use App\Repository\GameRepository;
use App\Repository\StatisticRepository;
use App\Repository\TeamRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NbaController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var GameRepository
     */
    private $gameRepository;
    /**
     * @var TeamRepository
     */
    private $teamRepository;
    /**
     * @var StatisticRepository
     */
    private $statisticRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        GameRepository $gameRepository,
        TeamRepository $teamRepository,
        StatisticRepository $statisticRepository
    )
    {
        $this->entityManager = $entityManager;
        $this->gameRepository = $gameRepository;
        $this->teamRepository = $teamRepository;
        $this->statisticRepository = $statisticRepository;
    }

    /**
     * @Route("/", name="nba")
     */
    public function index(Request $request)
    {
        $defaultData = ['message' => 'Message goes here'];
        $form = $this->createFormBuilder($defaultData)
            ->add('searchText', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'
            ])
            ->add('search', ButtonType::class)
            ->getForm();

        $form->handleRequest($request);

        return $this->render('nba/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/search", name="search_path", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getResult(Request $request){
        if(null === $request->get('date') || '' === $request->get('date')){
            return new JsonResponse(['error' => 'Lütfen tarih seçin'], Response::HTTP_BAD_REQUEST);
        }

        $players = $this->entityManager->getConnection()->executeQuery(
            "
                SELECT 
                *, 
                (SELECT name FROM team WHERE team.short_name = sv.team) as team_name,  
                (SELECT name FROM team WHERE team.short_name = sv.opponent) as opponent_name  
                FROM statistics_view sv 
                LEFT JOIN game g ON g.team = sv.team AND g.opponent = sv.opponent AND g.date = sv.date 
                WHERE sv.date='".$request->get('date')."' AND 
                 (sv.reb + sv.ass + sv.ste + sv.blo + sv.poi) >= 2
            "
        )
            ->fetchAll();

        if(count($players)>0){
            return new JsonResponse(
                [
                    'result' => $players,
                    'message' => count($players).' adet kayıt bulundu'
                ]
            );
        }else{
            return new JsonResponse(['result' => $players, 'message' => 'Sonuç bulunamadı'],Response::HTTP_NOT_FOUND);
        }
    }}
