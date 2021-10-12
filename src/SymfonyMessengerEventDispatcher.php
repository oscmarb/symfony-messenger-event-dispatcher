<?php

declare(strict_types=1);

namespace Oscmarb\SymfonyMessengerEventDispatcher;

use Oscmarb\Ddd\Domain\DomainEvent\DomainEvent;
use Oscmarb\Ddd\Domain\DomainEvent\EventDispatcher;
use Oscmarb\MessengerBus\SymfonyMessengerBus;

final class SymfonyMessengerEventDispatcher implements EventDispatcher
{
    private SymfonyMessengerBus $bus;

    public function __construct(array $handlers, array $middlewares)
    {
        $this->bus = new SymfonyMessengerBus($handlers, $middlewares, false);
    }

    public function dispatch(DomainEvent ...$events): void
    {
        foreach ($events as $event) {
            $this->bus->dispatch($event);
        }
    }
}