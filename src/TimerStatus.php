<?php

declare(strict_types=1);

namespace Jmf\Time;

enum TimerStatus
{
    case READY;
    case STOPPED;
    case STARTED;
}
