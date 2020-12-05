<?php

declare(strict_types=1);

namespace Aoc\Puzzle;

class Day3 implements PuzzleInterface
{
    public function partA(array $data): ?string
    {
        $count = 0;
        $pos = 3;

        for ($row = 1; $row < count($data); $row++) {
            $rowSize = count(str_split($data[$row]));

            if ($pos >= $rowSize) {
                $pos = $pos - $rowSize;
            }

            if ($data[$row][$pos] && '#' === $data[$row][$pos]) {
                $count++;
            }

            $pos += 3;
        }

        if ($count > 0) {
            return $count . '';
        }

        return null;
    }

    public function partB(array $data): ?string
    {
        return null;
    }
}
