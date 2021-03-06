<?php

declare(strict_types=1);

namespace Aoc\Command;

use Aoc\Puzzle\PuzzleInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AdventOfCode extends Command
{
    protected function configure()
    {
        $this->setName('aoc')
            ->setDescription('Advent of Code 2020')
            ->addArgument('day', InputArgument::REQUIRED, 'which day of the AOC puzzle')
            ->addArgument('part', InputArgument::OPTIONAL, 'which part of the AOC puzzle', 'a')
            ->addOption('test', 't', InputOption::VALUE_NONE, 'Use example input');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $dayValue = $input->getArgument('day');
        $partValue = $input->getArgument('part');
        $useTestData = $input->getOption('test');

        $puzzleInputFile = __DIR__;
        $puzzleInputFile .= ($useTestData) ?  "/../Resources/test/day$dayValue.txt" : "/../Resources/day$dayValue.txt";
        $puzzleClassName = "\Aoc\Puzzle\Day$dayValue";

        if (!file_exists($puzzleInputFile)) {
            $io->error("Seems the puzzle input of day [$dayValue] is missing.");

            return Command::FAILURE;
        }

        if (!class_exists($puzzleClassName)) {
            $io->error("Seems the puzzle class of day [$dayValue] is missing.");

            return Command::FAILURE;
        }

        if (!in_array(strtolower($partValue), ['a', 'b'])) {
            $io->error("Seems the puzzle part you entered for day [$dayValue] is an invalid value: [$partValue]. Only one of the two values is expected: a or b");

            return Command::FAILURE;
        }

        $puzzleInput = preg_split('/(\r\n|\r|\n)/', file_get_contents($puzzleInputFile));

        /** @var PuzzleInterface $puzzle */
        $puzzle = new $puzzleClassName();
        $result = '';

        if ('a' === strtolower($partValue)) {
            $result = $puzzle->partA($puzzleInput);
        }

        if ('b' === strtolower($partValue)) {
            $result = $puzzle->partB($puzzleInput);
        }

        if (is_null($result)) {
            $io->warning("Day($dayValue) - part($partValue) returned with a NULL. ");

            return Command::FAILURE;
        }

        $io->success("Day($dayValue) - part($partValue) answer is: [$result]");

        return Command::SUCCESS;
    }
}
