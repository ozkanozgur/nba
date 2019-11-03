<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatisticRepository")
 */
class Statistic implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $player;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string")
     * @ORM\JoinColumn(nullable=false)
     */
    private $team;

    /**
     * @ORM\Column(type="string")
     * @ORM\JoinColumn(nullable=false)
     */
    private $opponent;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $totalRebounds;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $assists;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $steals;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $blocks;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $points;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayer(): ?string
    {
        return $this->player;
    }

    public function setPlayer(string $player): self
    {
        $this->player = $player;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTeam(): ?string
    {
        return $this->team;
    }

    public function setTeam(?string $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getOpponent(): ?string
    {
        return $this->opponent;
    }

    public function setOpponent(?string $opponent): self
    {
        $this->opponent = $opponent;

        return $this;
    }

    public function getTotalRebounds(): ?int
    {
        return $this->totalRebounds;
    }

    public function setTotalRebounds(?int $totalRebounds): self
    {
        $this->totalRebounds = $totalRebounds;

        return $this;
    }

    public function getAssists(): ?int
    {
        return $this->assists;
    }

    public function setAssists(?int $assists): self
    {
        $this->assists = $assists;

        return $this;
    }

    public function getSteals(): ?int
    {
        return $this->steals;
    }

    public function setSteals(?int $steals): self
    {
        $this->steals = $steals;

        return $this;
    }

    public function getBlocks(): ?int
    {
        return $this->blocks;
    }

    public function setBlocks(?int $blocks): self
    {
        $this->blocks = $blocks;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): self
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return array(
            'id'            => $this->id,
            'player'        => $this->player,
            'date'          => $this->date,
            'team'          => $this->team,
            'opponent'      => $this->opponent,
            'totalRebounds' => $this->totalRebounds,
            'assists'       => $this->assists,
            'steals'        => $this->steals,
            'blocks'        => $this->blocks,
            'points'        => $this->points,
        );
    }
}
