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
     * @var int
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
     * Name getter
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Name setter
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Image getter
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Image setter
     * @param string $image
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

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
     * @return self
     */
    public function addWonder(Wonder $wonder)
    {
        $this->wonders[] = $wonder;

        return $this;
    }
}
