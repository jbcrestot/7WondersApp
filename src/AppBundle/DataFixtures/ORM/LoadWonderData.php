<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Items\Wonder;
use Doctrine\Common\Persistence\ObjectManager;

class LoadWonderData extends AbstractLoadData
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->fixtures as $fixture) {
            $wonder = new Wonder();
            $wonder->setLevel($fixture['level']);
            foreach ($fixture['requirements'] as $requirement) {
                $wonder->addRequirement(
                    $this->getReference($requirement)
                );
            }
            foreach ($fixture['benefits'] as $benefit) {
                $wonder->addBenefit(
                    $this->getReference($benefit)
                );

            }
            $manager->persist($wonder);
            $this->addReference('wonder_2woods_3VP', $wonder);
        }

        $manager->flush();

//        $this->addReference('wonder_3bricks_2MF', $wonder2);
//        $this->addReference('wonder_4ores_7VP', $wonder3);
    }

    public function getOrder() {

        return 3;
    }


}