<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Benefit;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadBenefitData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // PV
        $victroyPoint = new Benefit();
        $victroyPoint->setVictoryPoints(1);
        $manager->persist($victroyPoint);

        // militar point
        $militaryForce = new Benefit();
        $militaryForce->setMilitaryForces(1);
        $manager->persist($militaryForce);

        $gold = new Benefit();
        $gold->setGolds(1);
        $manager->persist($gold);

        $manager->flush();

        $this->addReference('victoryPoint', $victroyPoint);
        $this->addReference('militaryForce', $militaryForce);
        $this->addReference('goldCoin', $gold);
    }

    public function getOrder() {

        return 1;
    }


}