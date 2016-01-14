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
     * @param Resource $resource
     * @return Resource[]
     */
    public function addResource(Resource $resource)
    {
        $this->resources[] = $resource;

        return $this->resources;
    }
}
