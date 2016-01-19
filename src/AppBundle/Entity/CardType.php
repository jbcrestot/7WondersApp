<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Entity\Items\Card;

/**
 * A card type is a groupment of cards
 * @author Vincent Catillon <contact@vincent-catillon.fr>
 * @ORM\Entity
 * @ORM\Table(name="card_type")
 */
class CardType
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
     * @ORM\Column(name="color", type="string")
     */
    private $color;

    /**
     * @var Card[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Items\Card", mappedBy="type")
     */
    private $cards;

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
     * Color getter
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Color setter
     * @param string $color
     * @return string
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this->color;
    }

    /**
     * Cards getter
     * @return Card[]
     */
    public function getCards()
    {
        return $this->cards;
    }

    /**
     * Cards setter
     * @param Card $card
     * @return Card[]
     */
    public function addCard(Card $card)
    {
        $this->cards[] = $card;

        return $this->cards;
    }
}
