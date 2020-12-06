<?php

declare(strict_types=1);

namespace Aoc\Puzzle;

class Day5 implements PuzzleInterface
{
    public function partA(array $data): ?string
    {
        $seatIds = $this->generateSeatIds($data);

        if (count($seatIds) > 0) {
            return max($seatIds) . '';
        }

        return null;
    }

    public function partB(array $data): ?string
    {
        $seatIds = $this->generateSeatIds($data);
        sort($seatIds);

        $tempSeatIds = range(min($seatIds), max($seatIds));
        $missingSeatId = array_diff($tempSeatIds, $seatIds);

        if (count($missingSeatId) === 1) {
            return current($missingSeatId) . '';
        }

        return null;
    }

    private function generateSeatIds(array $data): array
    {
        $seatIds = [];

        foreach ($data as $boardingPass) {
            $boardingPassData = str_split($boardingPass);
            $rows = [0, 128];
            for ($x = 0; $x < 7; $x++) {
                if ('F' === $boardingPassData[$x]) {
                    $rows[1] = ($rows[0] + $rows[1]) / 2;
                }

                if ('B' === $boardingPassData[$x]) {
                    $rows[0] = ($rows[0] + $rows[1]) / 2;
                }
            }

            $cols = [0, 8];
            for ($x = count($boardingPassData) - 3; $x < count($boardingPassData); $x++) {
                if ('L' === $boardingPassData[$x]) {
                    $cols[1] = ($cols[0] + $cols[1]) / 2;
                }

                if ('R' === $boardingPassData[$x]) {
                    $cols[0] = ($cols[0] + $cols[1]) / 2;
                }
            }

            if ($rows[0] === ($rows[1] - 1) && $cols[0] === ($cols[1] - 1)) {
                $seatIds[] = ($rows[0] * 8) + $cols[0];
            }
        }

        return $seatIds;
    }
}
