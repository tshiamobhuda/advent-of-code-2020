<?php

declare(strict_types=1);

namespace Aoc\Puzzle;

interface PuzzleInterface
{
    public function partA(array $data): ?string;
    public function partB(array $data): ?string;
}
