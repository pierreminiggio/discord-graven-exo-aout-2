<?php

require __DIR__ . '/vendor/autoload.php';

use PierreMiniggio\MinecraftTorchCoordinateFinder\App;

try {
    (new App($argv))->start();
} catch (Exception $e) {
    echo get_class($e) . ' : ' . $e->getMessage();
}

