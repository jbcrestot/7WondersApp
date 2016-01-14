<?php

namespace AppBundle\Entity\Items;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\CardType;

/**
 * A card is an object used by a player to play his turn during the game
 * @author Vincent Catillon <contact@vincent-catillon.fr>
 * @ORM\Entity
 * @ORM\Table(name="card")
 */
class Card extends Item
{
    /**
     * @var string
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var int
     * @ORM\Column(name="min_players", type="integer")
     */
    private $minPlayers;

    /**
     * @var string
     * @ORM\Column(name="image", type="string", unique=true, nullable=true)
     */
    private $image;

    /**
     * @var int
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var CardType
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CardType", inversedBy="cards")
     */
    private $type;

    /**
     * @var Card[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Items\Card", mappedBy="cardsTo")
     */
    private $cardsFrom;

    /**
     * @var Card[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Items\Card", inversedBy="cardsFrom")
     * @ORM\JoinTable(
     *     name="card_chain",
     *     joinColumns={@ORM\JoinColumn(name="id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="chain_id", referencedColumnName="id")}
     * )
     */
    private $cardsTo;

    /**
     * Card type getter
     * @return CardType
     */
    public function getCardType()
    {
        return $this->type;
    }

    /**
     * Card type setter
     * @param CardType $type
     * @return CardType
     */
    public function setCardType(CardType $type)
    {
        $this->type = $type;

        return $this->type;
    }

    /**
     * Cards from cards getter
     * @return Card[]
     */
    public function getCardsFrom()
    {
        return $this->cardsFrom;
    }

    /**
     * Cards from cards adder
     * @param Card $card
     * @return Card[]
     */
    public function addCardFrom(Card $card)
    {
        $this->cardsFrom[] = $card;

        return $this->cardsFrom;
    }

    /**
     * Cards to cards getter
     * @return Card[]
     */
    public function getCardsTo()
    {
        return $this->cardsTo;
    }

    /**
     * Cards to cards adder
     * @param Card $card
     * @return Card[]
     */
    public function addCardTo(Card $card)
    {
        $this->cardsTo[] = $card;

        return $this->cardsTo;
    }
}
