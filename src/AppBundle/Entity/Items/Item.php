<?php

namespace AppBundle\Entity\Items;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Benefit;
use AppBundle\Entity\Resource;

/**
 * An item is represented by a card or wonder, with benefits and requirements in order to be used
 * @author Vincent Catillon <contact@vincent-catillon.fr>
 * @ORM\MappedSuperclass
 */
abstract class Item
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Benefit[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Benefit")
     */
    protected $benefits;

    /**
     * @var Resource[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Resource")
     */
    protected $requirements;

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
     * Benefits getter
     * @return Benefit[]
     */
    public function getBenefits()
    {
        return $this->benefits;
    }

    /**
     * Benefit adder
     * @param Benefit $benefit
     * @return self
     */
    public function addBenefit(Benefit $benefit)
    {
        $this->benefits[] = $benefit;

        return $this;
    }

    /**
     * Requirements getter
     * @return Resource[]
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
     * Requirements adder
     * @param Resource $requirement
     * @return self
     */
    public function addRequirement(Resource $requirement)
    {
        $this->requirements[] = $requirement;

        return $this;
    }
}
