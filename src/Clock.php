<?php

declare(strict_types=1);

namespace Jmf\Time;

use DateTimeImmutable;
use DateTimeInterface;

class Clock implements ClockInterface
{
    private const string FORMAT_DATE = 'Y-m-d';

    private const string FORMAT_TIME = 'H:i:s';

    public function now(): DateTimeImmutable
    {
        return $this->doGetNow();
    }

    public function getDateTime(): DateTimeInterface
    {
        return $this->doGetNow();
    }

    public function getDateTimeString(): string
    {
        $now = $this->doGetNow();

        return sprintf(
            '%s %s',
            $now->format(self::FORMAT_DATE),
            $now->format(self::FORMAT_TIME),
        );
    }

    public function getDateString(): string
    {
        return $this->doGetNow()->format(self::FORMAT_DATE);
    }

    public function getTimeString(): string
    {
        return $this->doGetNow()->format(self::FORMAT_TIME);
    }

    public function getTimestamp(): int
    {
        return $this->doGetNow()->getTimestamp();
    }

    private function doGetNow(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }

    public function getMicrotime(): float
    {
        return microtime(true);
    }
}
