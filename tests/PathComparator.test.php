<?php

namespace TheSeer\Autoload\Tests {

    use TheSeer\Autoload\PathComparator;

    class PathComparatorTest extends \PHPUnit_Framework_TestCase {

        /**
         * @dataProvider directoriesProvider
         */
        public function testComparatorYieldsCorrectCommonBase(array $directories, $common) {
            $comparator = new PathComparator($directories);
            $this->assertEquals($common, $comparator->getCommondBase());
        }

        public function directoriesProvider() {
            return [
                'empty' => [
                    [], '/'
                ],
                'single' => [
                    array(__DIR__), __DIR__
                ],
                'two' => [
                    array(__DIR__, dirname(__DIR__)), dirname(__DIR__)
                ],
                'partns' => [
                    array(__DIR__ . '/../src', __DIR__ . '/../vendor/theseer'), dirname(__DIR__)
                ]
            ];
        }
    }

}
