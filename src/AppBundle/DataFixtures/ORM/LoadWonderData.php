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

        $wonder1->setRequirement(array(
            $this->getReference('wood'),
            $this->getReference('wood')
        ));
        // 3 vp
//        $wonder1->setBenefit();
        $manager->persist($wonder1);


        $manager->flush();
    }

    public function getOrder() {

        return 1;
    }


}