<?php

namespace AppBundle\Entity\Items;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Board;

/**
 * A wonder is a step played to gain some benefits and access to another wonder
 * @author Vincent Catillon <contact@vincent-catillon.fr>
 * @ORM\Entity
 * @ORM\Table(name="wonder")
 */
class Wonder extends Item
{
    /**
     * @var int
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var Board
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Board", inversedBy="wonders")
     */
    private $board;
}
