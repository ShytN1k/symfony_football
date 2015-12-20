<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Team
 * @package AppBundle\Entity
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="AppBundle\Repositories\TeamRepository")
 */
class Team
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $squadNumber;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $staffNumber;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Country", mappedBy="team", cascade={"persist"}, orphanRemoval=true)
     */
    private $country;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Player", mappedBy="team", cascade={"persist"}, orphanRemoval=true)
     */
    private $players;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Coach", mappedBy="team", cascade={"persist"}, orphanRemoval=true)
     */
    private $coaches;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Game", mappedBy="team", cascade={"persist"}, orphanRemoval=true)
     */
    private $games;

    public function __construct()
    {
        $this->players = new ArrayCollection();
        $this->coaches = new ArrayCollection();
        $this->games = new ArrayCollection();
    }

    /**
     * @param Player $player
     */
    public function addPlayer(Player $player)
    {
        $this->players[] = $player;
    }
    /**
     *
     * @param Player $player
     */
    public function removePlayer(Player $player)
    {
        $this->players->removeElement($player);
    }

    /**
     * @param Coach $coach
     */
    public function addCoach(Coach $coach)
    {
        $this->coaches[] = $coach;
    }
    /**
     *
     * @param Coach $coach
     */
    public function removeCoach(Coach $coach)
    {
        $this->coaches->removeElement($coach);
    }

    /**
     * @param Game $game
     */
    public function addGame(Game $game)
    {
        $this->games[] = $game;
    }
    /**
     *
     * @param Game $game
     */
    public function removeGame(Game $game)
    {
        $this->games->removeElement($game);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSquadNumber()
    {
        return $this->squadNumber;
    }

    /**
     * @param $squadNumber
     * @return $this
     */
    public function setSquadNumber($squadNumber)
    {
        $this->squadNumber = $squadNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStaffNumber()
    {
        return $this->staffNumber;
    }

    /**
     * @param $staffNumber
     * @return $this
     */
    public function setStaffNumber($staffNumber)
    {
        $this->staffNumber = $staffNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return int
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Get coaches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCoaches()
    {
        return $this->coaches;
    }

    /**
     * Get games
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGames()
    {
        return $this->games;
    }
}
