<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Conditions\Direction;

/**
 * A benefit is an added value to the player's hand
 * @author Vincent Catillon <contact@vincent-catillon.fr>
 * @ORM\Entity
 * @ORM\Table(name="benefit")
 */
class Benefit
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(name="gold", type="integer")
     */
    private $gold;

    /**
     * @var int
     * @ORM\Column(name="victory_point", type="integer")
     */
    private $victoryPoint;

    /**
     * @var int
     * @ORM\Column(name="military_force", type="integer")
     */
    private $militaryForce;

    /**
     * @var Science
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Science")
     */
    private $science;

    /**
     * @var Power
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Power")
     */
    private $power;

    /**
     * @var Direction[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Conditions\Direction")
     */
    private $directions;

    /**
     * @var Resource
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Resource")
     */
    private $resource;

    /**
     * Id getter
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Id setter
     * @param int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gold getter
     * @return int
     */
    public function getGold()
    {
        return $this->gold;
    }

    /**
     * Gold setter
     * @param int $gold
     * @return self
     */
    public function setGold($gold)
    {
        $this->gold = $gold;

        return $this;
    }

    /**
     * Victory point getter
     * @return int
     */
    public function getVictoryPoint()
    {
        return $this->victoryPoint;
    }

    /**
     * Victory point setter
     * @param int $victoryPoint
     * @return self
     */
    public function setVictoryPoint($victoryPoint)
    {
        $this->victoryPoint = $victoryPoint;

        return $this;
    }

    /**
     * Military force getter
     * @return int
     */
    public function getMilitaryForce()
    {
        return $this->militaryForce;
    }

    /**
     * Military force setter
     * @param int $militaryForce
     * @return self
     */
    public function setMilitaryForce($militaryForce)
    {
        $this->militaryForce = $militaryForce;

        return $this;
    }

    /**
     * Science getter
     * @return Science
     */
    public function getScience()
    {
        return $this->science;
    }

    /**
     * Science setter
     * @param Science $science
     * @return self
     */
    public function setScience(Science $science)
    {
        $this->science = $science;

        return $this;
    }

    /**
     * Power getter
     * @return Power
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Power setter
     * @param Power $power
     * @return self
     */
    public function setPower(Power $power)
    {
        $this->power = $power;

        return $this;
    }

    /**
     * Directions getter
     * @return Direction[]
     */
    public function getDirections()
    {
        return $this->directions;
    }

    /**
     * Directions adder
     * @param Direction $direction
     * @return self
     */
    public function addDirection(Direction $direction)
    {
        $this->directions[] = $direction;

        return $this;
    }

    /**
     * Resource getter
     * @return Resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Resource setter
     * @param Resource $resource
     * @return self
     */
    public function setResource(Resource $resource)
    {
        $this->resource = $resource;

        return $this;
    }
}
