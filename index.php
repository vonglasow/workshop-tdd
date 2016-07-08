<?php
require __DIR__ . '/vendor/autoload.php';

if (count($argv) < 3) {
    echo 'Wrong arguments you should pass at least 2 arguments';
    return;
}

array_shift($argv);

echo "start : ${argv[0]}" . PHP_EOL;
echo "end : ${argv[1]}" . PHP_EOL;

$cdd = new \Workshop\Countdown(
    new \Workshop\Moment($argv[0]),
    new \Workshop\Moment($argv[1])
);
echo $cdd->draw();
