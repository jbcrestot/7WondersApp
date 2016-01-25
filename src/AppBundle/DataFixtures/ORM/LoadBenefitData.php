<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Benefit;
use Doctrine\Common\Persistence\ObjectManager;

class LoadBenefitData extends AbstractLoadData
{
    public function load(ObjectManager $manager)
    {

        foreach ($this->fixtures as $fixture) {
            $benefit = new Benefit();
//            $benefit->setMinPlayers($fixture['min_players'])
//                ->setAge($fixture['age'])
//                ->setType($this->getReference('card_type.'.$fixture['type']));

            $manager->persist($benefit);
//            $this->addReference('card.'.$fixture['name'], $benefit);
        }
        $manager->flush();

    }

    public function getOrder() {

        return 1;
    }


}