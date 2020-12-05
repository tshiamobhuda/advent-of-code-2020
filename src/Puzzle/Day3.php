<?php

declare(strict_types=1);

namespace Aoc\Puzzle;

class Day3 implements PuzzleInterface
{
    private array $slopes = [
        ['right' => 1, 'down' => 1],
        ['right' => 3, 'down' => 1],
        ['right' => 5, 'down' => 1],
        ['right' => 7, 'down' => 1],
        ['right' => 1, 'down' => 2],
    ];

    public function partA(array $data): ?string
    {
        $count = $this->countTrees($data, $this->slopes[1]);

        if ($count > 0) {
            return $count . '';
        }

        return null;
    }

    public function partB(array $data): ?string
    {
        $product = 0;

        foreach ($this->slopes as $slope) {
            $count = $count = $this->countTrees($data, $slope);

            if ($count > 0) {
                $product = ($product === 0) ? $count : $product * $count ;
            }
        }

        if ($product > 0) {
            return $product . '';
        }

        return null;
    }

    private function countTrees(array $data, array $slope): int
    {
        $count = 0;
        $pos = $slope['right'];

        for ($row = $slope['down']; $row < count($data); $row += $slope['down']) {
            $rowSize = count(str_split($data[$row]));

            if ($pos >= $rowSize) {
                $pos = $pos - $rowSize;
            }

            if ($data[$row][$pos] && '#' === $data[$row][$pos]) {
                $count++;
            }

            $pos += $slope['right'];
        }

        return $count;
    }
}
