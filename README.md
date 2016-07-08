# Workshop-tdd


## Why?

We talk about TDD, we have a lot of resources about it. But, we need
practicing, so this repository allow with a simple example and a differents
step to understand and tests the TDD with a real small simple usage.

## Installation

```sh
make install
```

## Usage

```sh
php index.php 2000-01-01 2030-01-01
```

## Tests

All tests are split into 2 parts, the first part is about PHPUnit. We need to
have a tests for the most famous Unit Tests framework in PHP World. The second
part is about atoum. It's more recent and have good features so it's
interessting to use it also to see the difference into how the implementation
works. So to run all tests:

```sh
make tests
```

If you want to run only PHPUnits tests

```sh
make phpunit
```

and for atoum

```sh
make atoum
```

You can also activate the TDD mode (only available for atoum tests) which will
help you during the workshop simply run

```sh
make tdd
```

## Code coverage

A code coverage for phpunit and atoum is generated, you can found the coverage
for phpunit in folder `coverage/phpunit` and for atoum in `coverage/atoum`.
Atoum add a branch and path coverage in report so you can identify the missing
case. Both of them display a simple code coverage which represent the code
executed or not during test. This show where some tests are missings or not.

## Latest thing

In the end when you have finish step-6, you can practice and refactor the file index.php
For example try to replace all the file with something simplest as this code.

```php
<?php

require __DIR__ . '/vendor/autoload.php';

(new \Workshop\Deadline($argv))->run();
```
