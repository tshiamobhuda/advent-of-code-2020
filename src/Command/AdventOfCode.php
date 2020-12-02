<?php

declare(strict_types=1);

namespace Aoc\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AdventOfCode extends Command
{
    protected function configure()
    {
        $this->setName('aoc')
            ->setDescription('Advent of Code 2020')
            ->addArgument('day', InputArgument::REQUIRED, 'which day of the AOC puzzle')
            ->addArgument('part', InputArgument::OPTIONAL, 'which part of the AOC puzzle', 'a');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $dayValue = $input->getArgument('day');

        if (file_exists(__DIR__ . "/../Resources/day$dayValue.txt")) {
            //Do magic

            return Command::SUCCESS;
        }

        $io->error("Seems the puzzle input of day [$dayValue] is missing.");

        return Command::FAILURE;
    }
}
