<?php

namespace Jmf\Time;

use DateTimeInterface;
use PHPUnit\Framework\TestCase;

class ClockTest extends TestCase
{
    private Clock $clock;

    protected function setUp(): void
    {
        $this->clock = new Clock();
    }

    public function testGetDateTime(): void
    {
        $result = $this->clock->getDateTime();

        $this->assertInstanceOf(DateTimeInterface::class, $result);
    }

    public function testGetDateTimeString(): void
    {
        $result = $this->clock->getDateTimeString();

        $this->assertIsString($result);
    }

    public function testGetDateString(): void
    {
        $result = $this->clock->getDateString();

        $this->assertIsString($result);
    }

    public function testGetTimeString(): void
    {
        $result = $this->clock->getTimeString();

        $this->assertIsString($result);
    }

    public function testGetTimestamp(): void
    {
        $result = $this->clock->getTimestamp();

        $this->assertIsInt($result);
    }

    public function testGetMicrotime(): void
    {
        $result = $this->clock->getMicrotime();

        $this->assertIsFloat($result);
    }
}
