<?php

namespace Jmf\Time;

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

        $this->assertGreaterThan(0, $result->getTimestamp());
    }

    public function testGetDateTimeString(): void
    {
        $result = $this->clock->getDateTimeString();

        $this->assertNotEmpty($result);
    }

    public function testGetDateString(): void
    {
        $result = $this->clock->getDateString();

        $this->assertNotEmpty($result);
    }

    public function testGetTimeString(): void
    {
        $result = $this->clock->getTimeString();

        $this->assertNotEmpty($result);
    }

    public function testGetTimestamp(): void
    {
        $result = $this->clock->getTimestamp();

        $this->assertGreaterThan(0, $result);
    }

    public function testGetMicrotime(): void
    {
        $result = $this->clock->getMicrotime();

        $this->assertGreaterThan(0.0, $result);
    }
}
