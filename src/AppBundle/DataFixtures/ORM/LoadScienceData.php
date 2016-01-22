<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Science;

class LoadScienceData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * Fixtures data
     * @param array
     */
    private $fixtures;

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->fixtures = $container->getParameter('sciences');
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->fixtures as $fixture) {
            $item = new Science();
            $item
                ->setName($fixture['name']);
            $manager->persist($item);
            $this->addReference('science.'.$fixture['name'], $item);
        }
        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
