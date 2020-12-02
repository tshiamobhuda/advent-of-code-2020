<?php

declare(strict_types=1);

namespace Aoc\Puzzle;

class Day1 implements PuzzleInterface
{
    public function partA(array $data): ?string
    {
        $arr_length = count($data);

        for($j = 0; $j < $arr_length; $j++) {
            for($k = 0; $k < $arr_length; $k++) {
                if (2020 === ($data[$j] + $data[$k])) {
                    return $data[$j] * $data[$k] . '';
                }
            }
        }

        return null;
    }

    public function partB(array $data): ?string
    {
        $arr_length = count($data);

        for($j = 0; $j < $arr_length; $j++) {
            for($k = 0; $k < $arr_length; $k++) {
                for($l = 0; $l < $arr_length; $l++) {
                    if (2020 === ($data[$j] + $data[$k] + $data[$l])) {
                        return $data[$j] * $data[$k] * $data[$l] . '';
                    }
                }
            }
        }

        return null;
    }
}
