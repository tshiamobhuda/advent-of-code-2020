<?php

declare(strict_types=1);

namespace Aoc\Puzzle;

class Day5 implements PuzzleInterface
{
    public function partA(array $data): ?string
    {
        $seatIds = [];

        foreach ($data as $boardingPass) {
            $passData = str_split($boardingPass);

            $rows = [0, 128];
            for ($x = 0; $x < 7; $x++) {
                if ('F' === $passData[$x]) {
                    $rows[1] = ($rows[0] + $rows[1]) / 2;
                }

                if ('B' === $passData[$x]) {
                    $rows[0] = ($rows[0] + $rows[1]) / 2;
                }
            }

            $cols = [0, 8];
            for ($x = count($passData) - 3; $x < count($passData); $x++) {
                if ('L' === $passData[$x]) {
                    $cols[1] = ($cols[0] + $cols[1]) / 2;
                }

                if ('R' === $passData[$x]) {
                    $cols[0] = ($cols[0] + $cols[1]) / 2;
                }
            }

            if ($rows[0] === ($rows[1] -1) && $cols[0] === ($cols[1] -1)) {
                $seatIds[] = ($rows[0] * 8) + $cols[0];
            }
        }

        if (count($seatIds) > 0) {
            return max($seatIds) . '';
        }

        return null;
    }

    public function partB(array $data): ?string
    {
        return null;
    }
}
