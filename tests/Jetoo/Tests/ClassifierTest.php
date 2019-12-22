<?php declare(strict_types=1);

namespace Jetoo\Tests;

use Symfony\Component\Yaml\Yaml;
use Jetoo\Classifier;

class ClassifierTest extends TestCase
{
    /**
     * parseTest
     *
     * @test
     */
    public function parseTest(): void
    {
        $dir = __DIR__ . '/../../../jetoo/testsets';

        $scandir = @scandir($dir);
        if (false === $scandir) {
            $this->assertTrue(false, 'Not exists or permission denied DataSet files.');
            return;
        }

        $yamlArray = [];
        foreach ($scandir as $fileName) {
            if (true === in_array($fileName, ['.', '..'])) {
                continue;
            }

            $yamlFile = Yaml::parse(file_get_contents("{$dir}/{$fileName}"));
            if (false === $yamlFile) {
                $this->assertTrue(false, 'DataSet file load error.');
                return;
            }
            foreach ($yamlFile as $yamlRow) {
                $yamlArray[] = $yamlRow;
            }
        }

        if (true === empty($yamlArray)) {
            $this->assertTrue(false, 'DataSet file Read error.');
            return;
        }

        $this->assertTrue(true);
    }
}
