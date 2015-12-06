<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Team
 * @package AppBundle\Entity
 *
 * @ORM\Table(name="team")
 * @ORM\Entity()
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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Country", mappedBy="team")
     */
    private $country;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Player", mappedBy="team")
     */
    private $player;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Coach", mappedBy="team")
     */
    private $coach;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Game", mappedBy="team")
     */
    private $game;

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
}