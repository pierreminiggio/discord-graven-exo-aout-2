<?php

namespace PierreMiniggio\MinecraftTorchCoordinateFinder;

class MinecraftTorchCoordinateFinder
{

    public function run(int $torchLight, int $initialX = 0, int $initialY = 0): array
    {
        $coords = [];
        
        for ($i = 0; $i < $torchLight; $i++) {
            for ($j = 0; $j < $torchLight - $i; $j++) {
                $coords[($initialX + $i) . '_' . ($initialY + $j)] = [$initialX + $i, $initialY + $j];
                $coords[($initialX + $i) . '_' . ($initialY - $j)] = [$initialX + $i, $initialY - $j];
                $coords[($initialX - $i) . '_' . ($initialY + $j)] = [$initialX - $i, $initialY + $j];
                $coords[($initialX - $i) . '_' . ($initialY - $j)] = [$initialX - $i, $initialY - $j];
            }
        }

        return array_values($coords);
    }
}
