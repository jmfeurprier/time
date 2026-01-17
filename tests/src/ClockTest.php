<?php

declare(strict_types=1);

namespace Jmf\Time;

use PHPUnit\Framework\TestCase;

final class ClockTest extends TestCase
{
    private Clock $clock;

    protected function setUp(): void
    {
        $this->clock = new Clock();
    }

    public function testGetDateTime(): void
    {
        $result = $this->clock->getDateTime();

        self::assertGreaterThan(0, $result->getTimestamp());
    }

    public function testGetDateTimeString(): void
    {
        $result = $this->clock->getDateTimeString();

        self::assertNotEmpty($result);
    }

    public function testGetDateString(): void
    {
        $result = $this->clock->getDateString();

        self::assertNotEmpty($result);
    }

    public function testGetTimeString(): void
    {
        $result = $this->clock->getTimeString();

        self::assertNotEmpty($result);
    }

    public function testGetTimestamp(): void
    {
        $result = $this->clock->getTimestamp();

        self::assertGreaterThan(0, $result);
    }

    public function testGetMicrotime(): void
    {
        $result = $this->clock->getMicrotime();

        self::assertGreaterThan(0.0, $result);
    }
}
