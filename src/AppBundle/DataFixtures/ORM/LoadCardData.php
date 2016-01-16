<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Items\Card;

class LoadCardData  extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /*
         * brique
         */
        $card1 = new Card();
        $card1->setName('bassin argileux');
        $card1->setMinPlayers(3);
        $card1->setAge(1);
        $card1->setType($this->getReference('rawCardType'));
        $manager->persist($card1);

        /*
         * bois
         */
        $card2 = new Card();
        $card2->setName('chantier');
        $card2->setMinPlayers(3);
        $card2->setAge(1);
        $card2->setType($this->getReference('rawCardType'));
        $manager->persist($card2);

        /*
         * minerai
         */
        $card3 = new Card();
        $card3->setName('filon');
        $card3->setMinPlayers(3);
        $card3->setAge(1);
        $card3->setType($this->getReference('rawCardType'));
        $manager->persist($card3);

        /*
         * pierre
         */
        $card4 = new Card();
        $card4->setName('cavité');
        $card4->setMinPlayers(3);
        $card4->setAge(1);
        $card4->setType($this->getReference('rawCardType'));
        $manager->persist($card4);

        /*
         * pierre ou bois
         */
        $card5 = new Card();
        $card5->setName('exploitation forestière');
        $card5->setMinPlayers(3);
        $card5->setAge(1);
        $card5->setType($this->getReference('rawCardType'));
        $card5->addRequirement($this->getReference('coin'));
        $manager->persist($card5);

        /*
         * brique ou minerai
         */
        $card6 = new Card();
        $card6->setName('fosse argileuse');
        $card6->setMinPlayers(3);
        $card6->setAge(1);
        $card6->setType($this->getReference('rawCardType'));
        $card6->addRequirement($this->getReference('coin'));
        $manager->persist($card6);

        $card7 = new Card();
        $card7->setName('métier à tisser');
        $card7->setMinPlayers(3);
        $card7->setAge(1);
        $card7->setType($this->getReference('manuCardType'));
        $manager->persist($card7);

        $card4 = new Card();
        $card4->setName('verrerie');
        $card4->setMinPlayers(3);
        $card4->setAge(1);
        $card4->setType($this->getReference('manuCardType'));
        $manager->persist($card4);

        $card4 = new Card();
        $card4->setName('presse');
        $card4->setMinPlayers(3);
        $card4->setAge(1);
        $card4->setType($this->getReference('manuCardType'));
        $manager->persist($card4);

        $manager->flush();
    }

    public function getOrder() {

        return 2;
    }


}