<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Entity\Items\Wonder;

/**
 * A board is a composition or wonders placed in front of each player
 * @author Vincent Catillon <contact@vincent-catillon.fr>
 * @ORM\Entity
 * @ORM\Table(name="board")
 */
class Board
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="image", type="string", unique=true, nullable=true)
     */
    private $image;

    /**
     * @var Wonder[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Items\Wonder", mappedBy="board")
     */
    private $wonders;

    /**
     * Wonders getter
     * @return Wonder[]
     */
    public function getWonders()
    {
        return $this->wonders;
    }

    /**
     * Wonders adder
     * @param Wonder $wonder
     * @return Wonder[]
     */
    public function addWonder(Wonder $wonder)
    {
        $this->wonders[] = $wonder;

        return $this->wonders;
    }
}
