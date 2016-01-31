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

            if (!empty($fixture['victory_point'])) {
                $benefit->setGold($fixture['victory_point']);
            }

            if (!empty($fixture['military_force'])) {
                $benefit->setMilitaryForce($fixture['military_force']);
            }

            if (!empty($fixture['gold'])) {
                $benefit->setGold($fixture['gold']);
            }

            if (!empty($fixture['science'])) {
                $this->getReference('science.'.$fixture['science']);
            }

            if (!empty($fixture['resource'])) {
                $this->getReference('resource.'.$fixture['resource']);
            }

            if (!empty($fixture['direction'])) {
                $benefit->addDirection(
                    $this->getReference('direction.'.$fixture['direction'])
                );
            } else {
                $benefit->addDirection(
                    $this->getReference('direction.self')
                );
            }

            $manager->persist($benefit);
            $this->addReference('benefit.'.$fixture['reference'], $benefit);
        }
        $manager->flush();

    }

    public function getOrder() {

        return 2;
    }


}