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
