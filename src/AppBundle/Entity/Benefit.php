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
     * @ORM\Column(name="golds", type="integer")
     */
    private $golds;

    /**
     * @var int
     * @ORM\Column(name="victory_points", type="integer")
     */
    private $victoryPoints;

    /**
     * @var int
     * @ORM\Column(name="military_forces", type="integer")
     */
    private $militaryForces;

    /**
     * @var Science[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Science")
     */
    private $sciences;

    /**
     * @var Power[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Power")
     */
    private $powers;

    /**
     * @var Direction[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Conditions\Direction")
     */
    private $directions;

    /**
     * @var Resource[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Resource")
     */
    private $resources;

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
     * @return int
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this->id;
    }

    /**
     * Golds getter
     * @return int
     */
    public function getGolds()
    {
        return $this->golds;
    }

    /**
     * Golds setter
     * @param int $golds
     * @return int
     */
    public function setGolds($golds)
    {
        $this->golds = $golds;

        return $this->golds;
    }

    /**
     * Victory points getter
     * @return int
     */
    public function getVictoryPoints()
    {
        return $this->victoryPoints;
    }

    /**
     * Victory points setter
     * @param int $victoryPoints
     * @return int
     */
    public function setVictoryPoints($victoryPoints)
    {
        $this->victoryPoints = $victoryPoints;

        return $this->victoryPoints;
    }

    /**
     * Military forces getter
     * @return int
     */
    public function getMilitaryForces()
    {
        return $this->militaryForces;
    }

    /**
     * Military forces setter
     * @param int $militaryForces
     * @return int
     */
    public function setMilitaryForces($militaryForces)
    {
        $this->militaryForces = $militaryForces;

        return $this->militaryForces;
    }

    /**
     * Sciences getter
     * @return Science[]
     */
    public function getSciences()
    {
        return $this->sciences;
    }

    /**
     * Sciences adder
     * @param Science $science
     * @return Science[]
     */
    public function addScience(Science $science)
    {
        $this->sciences[] = $science;

        return $this->sciences;
    }

    /**
     * Powers getter
     * @return Power[]
     */
    public function getPowers()
    {
        return $this->powers;
    }

    /**
     * Powers adder
     * @param Power $power
     * @return Power[]
     */
    public function addPower(Power $power)
    {
        $this->powers[] = $power;

        return $this->powers;
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
     * @return Direction[]
     */
    public function addDirection(Direction $direction)
    {
        $this->directions[] = $direction;

        return $this->directions;
    }

    /**
     * Resources getter
     * @return Resource[]
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * Resources adder
     * @param \AppBundle\Entity\Resource $resource
     * @return Resource[]
     */
    public function addResource(Resource $resource)
    {
        $this->resources[] = $resource;

        return $this->resources;
    }
}
