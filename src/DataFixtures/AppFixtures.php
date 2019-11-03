<?php

namespace App\DataFixtures;

use App\Entity\Statistic;
use App\Entity\Team;
use App\Repository\TeamRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @var TeamRepository
     */
    private $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // Loads teams data
        $team = new Team();
        $team->setName('Toronto Raptors');
        $team->setShortName('TOR');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Boston Celtics');
        $team->setShortName('BOS');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Philadelphia 76ers');
        $team->setShortName('PHI');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Cleveland Cavaliers');
        $team->setShortName('CLE');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Indiana Pacers');
        $team->setShortName('IND');
        $manager->persist($team);
        $manager->flush();
        $manager->clear();

        $team = new Team();
        $team->setName('Miami Heat');
        $team->setShortName('MIA');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Milwaukee Bucks');
        $team->setShortName('MIL');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Washington Wizards');
        $team->setShortName('WAS');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Detroit Pistons');
        $team->setShortName('DET');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Charlotte Hornets');
        $team->setShortName('CHO');
        $manager->persist($team);
        $manager->flush();
        $manager->clear();

        $team = new Team();
        $team->setName('New York Knicks');
        $team->setShortName('NYK');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Brooklyn Nets');
        $team->setShortName('BRK');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Chicago Bulls');
        $team->setShortName('CHI');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Orlando Magic');
        $team->setShortName('ORL');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Atlanta Hawks');
        $team->setShortName('ATL');
        $manager->persist($team);
        $manager->flush();
        $manager->clear();

        $team = new Team();
        $team->setName('Houston Rockets');
        $team->setShortName('HOU');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Golden State Warriors');
        $team->setShortName('GSW');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Portland Trail Blazers');
        $team->setShortName('POR');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Oklahoma City Thunder');
        $team->setShortName('OKC');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Utah Jazz');
        $team->setShortName('UTA');
        $manager->persist($team);
        $manager->flush();
        $manager->clear();

        $team = new Team();
        $team->setName('New Orleans Pelicans');
        $team->setShortName('NOP');
        $manager->persist($team);

        $team = new Team();
        $team->setName('San Antonio Spurs');
        $team->setShortName('SAS');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Minnesota Timberwolves');
        $team->setShortName('MIN');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Denver Nuggets');
        $team->setShortName('DEN');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Los Angeles Clippers');
        $team->setShortName('LAC');
        $manager->persist($team);
        $manager->flush();
        $manager->clear();

        $team = new Team();
        $team->setName('Los Angeles Lakers');
        $team->setShortName('LAL');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Sacramento Kings');
        $team->setShortName('SAC');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Dallas Mavericks');
        $team->setShortName('DAL');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Memphis Grizzlies');
        $team->setShortName('MEM');
        $manager->persist($team);

        $team = new Team();
        $team->setName('Phoenix Suns');
        $team->setShortName('PHO');
        $manager->persist($team);
        $manager->flush();
        $manager->clear();
        // Loads teams data
    }
}
