<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\CardType;

class LoadCardTypeData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $this->fixtures = $container->getParameter('card_types');
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->fixtures as $fixture) {
            $item = new CardType();
            $item->setName($fixture['name']);
            $item->setColor($fixture['color']);
            $manager->persist($item);
            $this->addReference('card_type.'.$fixture['name'], $item);
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
