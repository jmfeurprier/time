<?php

namespace Jmf\Time;

use DateTimeImmutable;
use DateTimeInterface;

class Clock implements ClockInterface
{
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }

    public function getDateTime(): DateTimeInterface
    {
        return $this->now();
    }

    public function getDateTimeString(): string
    {
        return "{$this->getDateString()} {$this->getTimeString()}";
    }

    public function getDateString(): string
    {
        return $this->now()->format('Y-m-d');
    }

    public function getTimeString(): string
    {
        return $this->now()->format('H:i:s');
    }

    public function getTimestamp(): int
    {
        return $this->now()->getTimestamp();
    }

    public function getMicrotime(): float
    {
        return microtime(true);
    }
}
