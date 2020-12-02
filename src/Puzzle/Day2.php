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
        $count = 0;

        foreach ($data as $passwordWthPolicy) {
            $result = preg_split('/[\s:-]+/', $passwordWthPolicy);
            $indexA = $result[0];
            $indexB = $result[1];
            $char = $result[2];
            $password = $result[3];

            if ($char === $password[$indexA - 1] && $char === $password[$indexB - 1]) {
                continue;
            }

            if ($char === $password[$indexA - 1]) {
                $count++;
            }

            if ($char === $password[$indexB - 1] ) {
                $count ++;
            }
        }

        if ($count > 0) {
            return $count . '';
        }

        return null;
    }
}