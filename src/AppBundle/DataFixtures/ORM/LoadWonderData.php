<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Items\Wonder;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadWonderData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $wonder1 = new Wonder();
        $wonder1->setLevel(1);
        $wonder1->setRequirements(array(
            $this->getReference('wood'),
            $this->getReference('wood')
        ));
        $wonder1->setBenefits(array(
            $this->getReference('victoryPoint'),
            $this->getReference('victoryPoint'),
            $this->getReference('victoryPoint'),
        ));
        $manager->persist($wonder1);

        $wonder2 = new Wonder();
        $wonder2->setLevel(2)
            ->setRequirements(array(
                $this->getReference('brick'),
                $this->getReference('brick'),
                $this->getReference('brick'),
            ))
            ->setBenefits(array(
                $this->getReference('militaryForce'),
                $this->getReference('militaryForce'),
            ))
            ;
        $manager->persist($wonder2);

        $wonder3 = new Wonder();
        $wonder3->setLevel(3)
            ->setRequirements(array(
                $this->getReference('ore'),
                $this->getReference('ore'),
                $this->getReference('ore'),
                $this->getReference('ore'),
            ))
            ->setBenefits(array(
                $this->getReference(array(
                    $this->getReference('victoryPoint'),
                    $this->getReference('victoryPoint'),
                    $this->getReference('victoryPoint'),
                    $this->getReference('victoryPoint'),
                    $this->getReference('victoryPoint'),
                    $this->getReference('victoryPoint'),
                    $this->getReference('victoryPoint'),
                ))
            ))
            ;

        $manager->flush();

        $this->addReference('wonder_2woods_3VP', $wonder1);
        $this->addReference('wonder_3bricks_2MF', $wonder2);
        $this->addReference('wonder_4ores_7VP', $wonder3);
    }

    public function getOrder() {

        return 2;
    }


}