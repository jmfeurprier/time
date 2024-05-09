<?php

namespace Jmf\Time;

use PHPUnit\Framework\TestCase;

class TimerTest extends TestCase
{
    private Timer $timer;

    protected function setUp(): void
    {
        $this->timer = new Timer();
    }

    public function testGetElapsedReturnsNoDurationWhenNeverStarted(): void
    {
        $this->wait();

        $result = $this->timer->getElapsed();

        $this->assertSame(0.0, $result);
    }

    public function testGetElapsedReturnsNoDurationWhenStartedThenReset(): void
    {
        $this->timer->start();

        $this->wait();

        $this->timer->reset();

        $result = $this->timer->getElapsed();

        $this->assertSame(0.0, $result);
    }

    public function testGetElapsedReturnsDurationWhenStarted(): void
    {
        $this->timer->start();

        $this->wait();

        $result = $this->timer->getElapsed();

        $this->assertGreaterThan(0.0, $result);
    }

    public function testGetElapsedReturnsDifferentDurationsWhenStarted(): void
    {
        $this->timer->start();

        $this->wait();

        $resultPrimary = $this->timer->getElapsed();

        $this->wait();

        $resultSecondary = $this->timer->getElapsed();

        $this->assertGreaterThan($resultPrimary, $resultSecondary);
    }

    public function testGetElapsedReturnsSameDurationsWhenStopped(): void
    {
        $this->timer->start();

        $this->wait();

        $this->timer->stop();

        $resultPrimary = $this->timer->getElapsed();

        $this->wait();

        $resultSecondary = $this->timer->getElapsed();

        $this->assertSame($resultPrimary, $resultSecondary);
    }

    public function testRestart(): void
    {
        $this->timer->start();

        $this->wait();
        $this->wait();

        $resultPrimary = $this->timer->getElapsed();

        $this->timer->restart();

        $this->wait();

        $resultSecondary = $this->timer->getElapsed();

        $this->assertLessThan($resultPrimary, $resultSecondary);
    }

    private function wait(): void
    {
        usleep(12345);
    }
}
