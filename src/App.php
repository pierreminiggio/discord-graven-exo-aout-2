<?php

namespace PierreMiniggio\MinecraftTorchCoordinateFinder;

use InvalidArgumentException;
use Exception;

class App
{
    private array $context;

    public function __construct(array $context)
    {
        $this->context = $context;
    }

    /**
     * @throws Exception
     */
    public function start(): void
    {
        if (! $this->enoughArgs() || ! $this->isArg1Int()) {
            throw new InvalidArgumentException('use like this : php main.php [number]');
        }

        echo json_encode((new MinecraftTorchCoordinateFinder())->run($this->context[1]));
    }

    private function enoughArgs(): bool
    {
        return count($this->context) === 2;
    }

    private function isArg1Int(): bool
    {
        return (int) $this->context[1] >= 0;
    }
}
