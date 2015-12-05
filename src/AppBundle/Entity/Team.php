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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
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
     * @param mixed $name
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
     * @param mixed $squadNumber
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
     * @param mixed $staffNumber
     */
    public function setStaffNumber($staffNumber)
    {
        $this->staffNumber = $staffNumber;

        return $this;
    }
}