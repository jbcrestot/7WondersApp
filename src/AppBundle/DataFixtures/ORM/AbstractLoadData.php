<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\Yaml\Parser;

abstract class AbstractLoadData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Fixtures folder
     * @param string
     */
    const FIXTURES_FOLDER = '/../../Resources/config/fixtures/';

    /**
     * Fixtures data
     * @param array
     */
    protected $fixtures;

    /**
     * LoadData constructor.
     */
    public function __construct()
    {
        $parser = new Parser();
        $filename = __DIR__.self::FIXTURES_FOLDER.$this->getFixturesFilename();
        if (!file_exists($filename)) {
            throw new FileNotFoundException(null, 404, null, $filename);
        }
        $fixtures = $parser->parse(file_get_contents($filename));
        $this->fixtures = $fixtures['fixtures'];
    }

    /**
     * Fixtures filename getter
     * @return string
     */
    private function getFixturesFilename()
    {
        $reflectionClass = new \ReflectionClass($this);
        $className = strtr($reflectionClass->getShortName(), array(
            'Load' => '',
            'Data' => '',
        ));
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $className, $matches);
        $return = $matches[0];
        foreach ($return as &$match) {
            $match = $match === strtoupper($match) ? strtolower($match) : lcfirst($match);
        }

        return implode('_', $return).'.yml';
    }
}
