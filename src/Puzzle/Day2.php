<?php

declare(strict_types=1);

namespace Aoc\Puzzle;

class Day2 implements PuzzleInterface
{
    public function partA(array $data): ?string
    {
        $count = 0;

        foreach ($data as $passwordWthPolicy) {
            $result = preg_split('/[\s:-]+/', $passwordWthPolicy);
            $searchResult = substr_count($result[3], $result[2]);

            if ($searchResult >= $result[0] && $searchResult <= $result[1]) {
                $count++;
            }
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