<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Board;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadBoardData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /*
         * brique
         */
        $board1 = new Board();
        $board1->setName('Le colosse de Rhodes');
        $board1->setFace('A');
        $board1->setBenefit($this->getReference('ore'));
        // need wonders
//        $board1->addWonder();
        $manager->persist($board1);


        $manager->flush();
    }

    public function getOrder() {

        return 2;
    }


}