<?php

namespace Jmf\Time;

readonly class TimerFactory
{
    public function __construct(
        private ClockInterface $clock = new Clock(),
    ) {
    }

    public function create(): TimerInterface
    {
        return new Timer($this->clock);
    }
}
