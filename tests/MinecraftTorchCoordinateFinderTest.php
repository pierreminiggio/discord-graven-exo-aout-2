<?php

namespace PierreMiniggio\MinecraftTorchCoordinateFinder\Tests;

use PHPUnit\Framework\TestCase;
use PierreMiniggio\MinecraftTorchCoordinateFinder\MinecraftTorchCoordinateFinder;

class MinecraftTorchCoordinateFinderTest extends TestCase
{
    public function testGivenData(): void
    {
        $testData = [
            [
                0,
                []
            ],
            [
                1,
                [[0, 0]]
            ],
            [
                2,
                [[1, 0], [0, 1], [0, 0], [0, -1], [-1, 0]]
            ],
            [
                3,
                [[2, 0], [1, 1], [1, 0], [1, -1], [0, 2], [0, 1], [0, 0], [0, -1], [0, -2], [-1 ,1], [-1, 0], [-1, -1], [-2, 0]]
            ]
        ];

        $finder = new MinecraftTorchCoordinateFinder();

        foreach ($testData as $data) {
            $this->assertSameCoords($data[1], $finder->run($data[0]));
        }
    }

    protected function assertSameCoords(array $expected, array $actual): void
    {
        $message = 'Expected : ' . json_encode($expected) . 'Actual : ' . json_encode($actual);

        $this->assertSame(count($expected), count($actual), $message);

        if (count($expected) === count($actual)) {
            for ($i = 0; $i++; $i < count($expected)) {
                $this->assertSame(
                    $expected[$i][0],
                    $actual[$i][0],
                    'Expected : ' . json_encode($expected[$i]) . 'Actual : ' . json_encode($actual[$i])
                );
                $this->assertSame(
                    $expected[$i][1],
                    $actual[$i][1],
                    'Expected : ' . json_encode($expected[$i]) . 'Actual : ' . json_encode($actual[$i])
                );
            }
        }
    }
}
