<?php

namespace AppBundle\Entity;

class Team
{
    private $id;
    private $name;
    private $squadNumber;
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
    }
}