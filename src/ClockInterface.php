<?php

namespace Jmf\Time;

use DateTimeInterface;
use Psr\Clock\ClockInterface as PsrClockInterface;

interface ClockInterface extends PsrClockInterface
{
    public function getDateTime(): DateTimeInterface;

    public function getDateTimeString(): string;

    public function getDateString(): string;

    public function getTimeString(): string;

    public function getTimestamp(): int;

    public function getMicrotime(): float;
}
