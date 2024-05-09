<?php

namespace Jmf\Time;

class Timer implements TimerInterface
{
    private readonly ClockInterface $clock;

    private TimerStatus $status = TimerStatus::READY;

    private ?float $startMicrotime = null;

    private float $elapsedSeconds = 0.0;

    public function __construct(ClockInterface $clock = null)
    {
        $this->clock = $clock ?? new Clock();
    }

    public function start(): void
    {
        $now = $this->now();

        $this->startMicrotime = $now;
        $this->status         = TimerStatus::STARTED;
    }

    public function stop(): void
    {
        $now = $this->now();

        if (TimerStatus::STARTED === $this->status) {
            $this->elapsedSeconds += ($now - $this->startMicrotime);
            $this->status         = TimerStatus::STOPPED;
        }
    }

    public function reset(): void
    {
        $this->startMicrotime = null;
        $this->elapsedSeconds = 0.0;
        $this->status         = TimerStatus::READY;
    }

    public function restart(): void
    {
        $now = $this->now();

        $this->startMicrotime = $now;
        $this->elapsedSeconds = 0.0;
        $this->status         = TimerStatus::STARTED;
    }

    public function getElapsed(): float
    {
        $now = $this->now();

        if (TimerStatus::STARTED === $this->status) {
            return $this->elapsedSeconds + ($now - $this->startMicrotime);
        }

        return $this->elapsedSeconds;
    }

    private function now(): float
    {
        return $this->clock->getMicrotime();
    }
}
