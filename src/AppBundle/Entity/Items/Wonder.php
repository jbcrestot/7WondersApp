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

    /**
     * Level getter
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Level setter
     * @param int $level
     * @return self
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Board getter
     * @return Board
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * Board setter
     * @param Board $board
     * @return self
     */
    public function setBoard($board)
    {
        $this->board = $board;

        return $this;
    }
}
