<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Conditions\Direction;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDirectionData extends AbstractLoadData
{
    public function load(ObjectManager $manager)
    {

        foreach ($this->fixtures as $fixture) {
            $direction = new Direction();
            $direction->setName($fixture['name']);

            $manager->persist($direction);
            $this->addReference('direction.'.$fixture['name'], $direction);
        }
        $manager->flush();

    }

    public function getOrder() {

        return 1;
    }


}