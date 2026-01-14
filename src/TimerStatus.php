<?php

namespace Jmf\Time;

enum TimerStatus
{
    case READY;
    case STOPPED;
    case STARTED;
}
