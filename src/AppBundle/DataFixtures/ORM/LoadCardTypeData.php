<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\CardType;

class LoadCardTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $cardType1 = new CardType();
        $cardType1->setName('raw_materials');
        $cardType1->setColor('brown');
        $manager->persist($cardType1);

        $cardType2 = new CardType();
        $cardType2->setName('manufactured_products');
        $cardType2->setColor('gray');
        $manager->persist($cardType2);

        $cardType3 = new CardType();
        $cardType3->setName('civil_buildings');
        $cardType3->setColor('blue');
        $manager->persist($cardType3);

        $cardType4 = new CardType();
        $cardType4->setName('scientific_buildings');
        $cardType4->setColor('green');
        $manager->persist($cardType4);

        $cardType5 = new CardType();
        $cardType5->setName('commercial_buildings');
        $cardType5->setColor('yellow');
        $manager->persist($cardType5);

        $cardType6 = new CardType();
        $cardType6->setName('military_buildings');
        $cardType6->setColor('red');
        $manager->persist($cardType6);

        $cardType7 = new CardType();
        $cardType7->setName('guilds');
        $cardType7->setColor('purple');
        $manager->persist($cardType7);


        $manager->flush();

        $this->addReference('rawCardType', $cardType1);
        $this->addReference('manuCardType', $cardType2);
        $this->addReference('CivilCardType', $cardType3);
        $this->addReference('ScientificCardType', $cardType4);
        $this->addReference('commercialCardType', $cardType5);
        $this->addReference('militaryCardType', $cardType6);
        $this->addReference('guildsCardType', $cardType7);
    }

    public function getOrder() {

        return 1;
    }
}