<?php

namespace AppBundle\Entity\Conditions;

use Doctrine\ORM\Mapping as ORM;

/**
 * A direction is a condition to apply to benefit cards
 * @author Vincent Catillon <contact@vincent-catillon.fr>
 * @ORM\Entity
 * @ORM\Table(name="direction")
 */
class Direction
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
     * @ORM\Column(name="code", type="string")
     */
    private $code;

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
     * @param mixed $id
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
     * Code getter
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Code setter
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }
}
