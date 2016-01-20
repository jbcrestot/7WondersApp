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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Items\Card", mappedBy="next")
     */
    private $previous;

    /**
     * @var Card[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Items\Card", inversedBy="previous")
     * @ORM\JoinTable(
     *     name="card_chain",
     *     joinColumns={@ORM\JoinColumn(name="id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="chain_id", referencedColumnName="id")}
     * )
     */
    private $next;

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
     * MinPlayers getter
     * @return int
     */
    public function getMinPlayers()
    {
        return $this->minPlayers;
    }

    /**
     * MinPlayers setter
     * @param int $minPlayers
     * @return self
     */
    public function setMinPlayers($minPlayers)
    {
        $this->minPlayers = $minPlayers;

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
     * Age getter
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Age setter
     * @param int $age
     * @return self
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Type getter
     * @return CardType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Type setter
     * @param CardType $type
     * @return self
     */
    public function setType(CardType $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Previous cards getter
     * @return Card[]
     */
    public function getPrevious()
    {
        return $this->previous;
    }

    /**
     * Previous cards adder
     * @param Card $card
     * @return self
     */
    public function addPrevious(Card $card)
    {
        $this->previous[] = $card;

        return $this;
    }

    /**
     * Next cards getter
     * @return Card[]
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * Next cards adder
     * @param Card $card
     * @return self
     */
    public function addNext(Card $card)
    {
        $this->next[] = $card;

        return $this;
    }
}
