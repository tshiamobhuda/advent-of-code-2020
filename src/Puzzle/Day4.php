<?php

declare(strict_types=1);

namespace Aoc\Puzzle;

class Day4 implements PuzzleInterface
{
    public function partA(array $data): ?string
    {
        $fields = [
            'byr',
            'iyr',
            'eyr',
            'hgt',
            'hcl',
            'ecl',
            'pid',
//        'cid',
        ];
        $validPassports = 0;
        $passports = $this->extractPassports($data);

        foreach ($passports as $passport)
        {
            $count = 0;

            foreach ($fields as $field) {
                if (str_contains($passport, $field)) {
                    $count++;
                }
            }

            if ($count === count($fields)) {
                $validPassports++;
            }

        }

        if ($validPassports > 0) {
            return $validPassports . '';
        }

        return null;
    }

    public function partB(array $data): ?string
    {
        return null;
    }

    private function extractPassports(array $data): array
    {
        $passports = [];
        $passportLine = '';

        foreach ($data as $key => $line)
        {
            $isLastLine = $key === count($data) - 1;
            if (strlen($line) === 0 || $isLastLine) {
                $passports[] = ($isLastLine) ? "$passportLine $line" : $passportLine;
                $passportLine = '';

                continue;
            }

            $passportLine .= " $line";
        }

        return $passports;
    }
}