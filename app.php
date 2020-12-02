<?php

require __DIR__ . '/vendor/autoload.php';

use Aoc\Command\AdventOfCode;
use Symfony\Component\Console\Application;

$application = new Application('AOC-2020');

$command = new AdventOfCode();
$application->add($command);
$application->setDefaultCommand($command->getName(), true);

$application->run();
