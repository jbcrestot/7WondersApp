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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Benefit
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Benefit", cascade={"persist"})
     */
    protected $benefit;

    /**
     * @var Resource[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Resource")
     */
    protected $requirements;

    /**
     * Benefit getter
     * @return Benefit
     */
    public function getBenefit()
    {
        return $this->benefit;
    }

    /**
     * Benefit setter
     * @param Benefit $benefit
     * @return Benefit
     */
    public function setBenefit(Benefit $benefit)
    {
        $this->benefit = $benefit;

        return $this->benefit;
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
     * @return Resource[]
     */
    public function addRequirement(Resource $requirement)
    {
        $this->requirements[] = $requirement;

        return $this->requirements;
    }
}
