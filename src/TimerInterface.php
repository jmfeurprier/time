<?php

namespace Jmf\Time;

interface TimerInterface
{
    public function start(): void;

    public function stop(): void;

    public function reset(): void;

    public function restart(): void;

    public function getElapsed(): float;
}
