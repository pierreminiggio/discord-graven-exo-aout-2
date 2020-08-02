<?php

namespace PierreMiniggio\MinecraftTorchCoordinateFinder;

class MinecraftTorchCoordinateFinder
{

    public function run(int $torchLight, int $initialX = 0, int $initialY = 0): array
    {

        $coords = [];

        if ($torchLight === 0) {
            return $coords;
        }

        $coords[] = [$initialX, $initialY];

        if ($torchLight === 1) {
            return $coords;
        }

        $allCoords = array_merge(
            $this->run($torchLight - 1, $initialX + 1, $initialY),
            $this->run($torchLight - 1, $initialX - 1, $initialY),
            $this->run($torchLight - 1, $initialX, $initialY + 1),
            $this->run($torchLight - 1, $initialX, $initialY - 1)
        );

        foreach ($allCoords as $newCoord) {
            $isIn = false;

            foreach ($coords as $coord) {
                if ($coord[0] === $newCoord[0] && $coord[1] === $newCoord[1]) {
                    $isIn = true;
                    break;
                }
            }

            if (! $isIn) {
                $coords[] = $newCoord;
            }
        }

        return $coords;
    }
}
