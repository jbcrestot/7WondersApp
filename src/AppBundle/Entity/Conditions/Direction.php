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
}
