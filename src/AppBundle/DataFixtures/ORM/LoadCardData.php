<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Items\Card;

class LoadCardData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $this->fixtures = $container->getParameter('cards');
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->fixtures as $fixture) {
            $item = new Card();
            $item
                ->setName($fixture['name'])
                ->setMinPlayers($fixture['min_players'])
                ->setAge($fixture['age'])
                ->setType($this->getReference('card_type.'.$fixture['type']));
            foreach ($fixture['requirements'] as $requirement) {
                $item->addRequirement($this->getReference('resource.'.$requirement));
            }
            $manager->persist($item);
            $this->addReference('card.'.$fixture['name'], $item);
        }
        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 2;
    }
}
