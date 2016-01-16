<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Resource;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadResourceData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $resource1 = new Resource();
        $resource1->setName('brick');
        $manager->persist($resource1);

        $resource2 = new Resource();
        $resource2->setName('ore');
        $manager->persist($resource2);

        $resource3 = new Resource();
        $resource3->setName('wood');
        $manager->persist($resource3);

        $resource4 = new Resource();
        $resource4->setName('stone');
        $manager->persist($resource4);

        $resource5 = new Resource();
        $resource5->setName('coin');
        $manager->persist($resource5);

        $resource6 = new Resource();
        $resource6->setName('papyrus');
        $manager->persist($resource6);

        $resource7 = new Resource();
        $resource7->setName('glass');
        $manager->persist($resource7);

        $resource8 = new Resource();
        $resource8->setName('fabric');
        $manager->persist($resource8);

        $manager->flush();

        $this->addReference('brick', $resource1);
        $this->addReference('ore', $resource2);
        $this->addReference('wood', $resource3);
        $this->addReference('stone', $resource4);
        $this->addReference('coin', $resource5);
        $this->addReference('papyrus', $resource6);
        $this->addReference('glass', $resource7);
        $this->addReference('fabric', $resource8);
    }

    public function getOrder() {

        return 1;
    }
}