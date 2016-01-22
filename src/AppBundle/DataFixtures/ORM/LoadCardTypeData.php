<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\CardType;

class LoadCardTypeData extends AbstractLoadData
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->fixtures as $fixture) {
            $item = new CardType();
            $item
                ->setName($fixture['name'])
                ->setColor($fixture['color']);
            $manager->persist($item);
            $this->addReference('card_type.'.$fixture['name'], $item);
        }
        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
