<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A resource is a natural material used to build wonders, or other cards
 * @author Vincent Catillon <contact@vincent-catillon.fr>
 * @ORM\Entity
 * @ORM\Table(name="resource")
 */
class Resource
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
     * @return string
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this->name;
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
     * @return string
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this->image;
    }
}
