Time package
============

## Installation & Requirements

Install with [Composer](https://getcomposer.org):

```shell script
composer require jmf/time
```

## Usage

### Clock

`Clock` allows to retrieve current time and date.

Injecting it in your application will allow to ease the testing of time-related operations (mocking its `ClockInterface` interface and making its return values predictable).

```php
<?php

use Jmf\Time\Clock;

$clock = new Clock();

// Will output something like "2020-01-23"
echo $clock->getDateTime()->format('Y-m-d');

// Will output something like "2020-01-23"
echo $clock->getDateString();

// Will output something like "15:16:17"
echo $clock->getTimeString();

// Will output something like "2020-01-23 15:16:17"
echo $clock->getDateTimeString();

// Will output something like "123456789"
echo $clock->getTimestamp();

// Will output something like "123456789.0123"
echo $clock->getMicrotime();
```

### Timer

`Timer` allows to mesure elapsed time (in seconds, with microsecond precision).
It can be started (`$timer->start()`), stopped (`$timer->stop()`), reset (`$timer->reset()`), and restarted (`$timer->restart()`). You can also query elapsed time (`$timer->getElapsed()`).

```php
<?php

use Jmf\Time\Timer;

$timer = new Timer();

sleep(1);

// Will output something like "0.0"
echo $timer->getElapsed();

$timer->start();

sleep(1);

// Will output something like "1.0023456"
echo $timer->getElapsed();

sleep(1);

$timer->stop();

sleep(1);

// Will output something like "2.0034567"
echo $timer->getElapsed();

$timer->restart();

sleep(1);

// Will output something like "1.0023456"
echo $timer->getElapsed();

sleep(1);

// Will output something like "2.0034567"
echo $timer->getElapsed();

$timer->reset();

sleep(1);

// Will output something like "0.0"
echo $timer->getElapsed();
```
