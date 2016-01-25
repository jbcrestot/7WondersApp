<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Board;
use Doctrine\Common\Persistence\ObjectManager;

class LoadBoardData extends AbstractLoadData
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->fixtures as $fixture) {
            $board = new Board();
            $board->setName($fixture['name'])
                ->setFace($fixture['face']);
            foreach ($fixture['wonders'] as $wonders) {
                $board->addWonder($wonders);
            }
            $manager->persist($board);
        }

        $manager->flush();
    }

    public function getOrder() {

        return 3;
    }


}