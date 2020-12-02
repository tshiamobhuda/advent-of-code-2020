<?php

declare(strict_types=1);

namespace Aoc\Puzzle;

class Day1 implements PuzzleInterface
{
    public function partA(array $data): ?string
    {
        $arr_length = count($data);

        for($k = 0; $k < $arr_length; $k++) {
            for($j = 0; $j < $arr_length; $j++) {
                if (2020 === ($data[$k] + $data[$j])) {
                    return $data[$k] * $data[$j] . '';
                }
            }
        }

        return null;
    }

    public function partB(array $data): ?string
    {
        return null;
    }
}
