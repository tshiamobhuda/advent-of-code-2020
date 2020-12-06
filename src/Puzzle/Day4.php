<?php

declare(strict_types=1);

namespace Aoc\Puzzle;

final class Day4 implements PuzzleInterface
{
    private array $fields = [
        'byr',
        'iyr',
        'eyr',
        'hgt',
        'hcl',
        'ecl',
        'pid',
    ];

    public function partA(array $data): ?string
    {
        $validPassports = 0;
        $passports = $this->extractPassports($data);

        foreach ($passports as $passport) {
            if ($this->hasAllRequiredFields($passport)) {
                ++$validPassports;
            }
        }

        if ($validPassports > 0) {
            return $validPassports . '';
        }

        return null;
    }

    public function partB(array $data): ?string
    {
        $validPassports = 0;
        $passports = $this->extractPassports($data);

        foreach ($passports as $passport) {
            if ($this->hasAllRequiredFields($passport)) {
                $passportFields = preg_split('/[\s]+/', trim($passport));

                $count = 0;
                foreach ($passportFields as $passportField) {
                    $passportFieldData = preg_split('/[:]+/', $passportField);

                    if ($this->isValid($passportFieldData[0], $passportFieldData[1])) {
                        ++$count;
                    }
                }

                if ($count === count($this->fields)) {
                    ++$validPassports;
                }
            }
        }

        if ($validPassports > 0) {
            return $validPassports . '';
        }

        return null;
    }

    private function extractPassports(array $data): array
    {
        $passports = [];
        $passportLine = '';

        foreach ($data as $key => $line) {
            $isLastLine = $key === count($data) - 1;
            if (0 === strlen($line) || $isLastLine) {
                $passports[] = ($isLastLine) ? "$passportLine $line" : $passportLine;
                $passportLine = '';

                continue;
            }

            $passportLine .= " $line";
        }

        return $passports;
    }

    private function hasAllRequiredFields(string $passport): bool
    {
        $count = 0;

        foreach ($this->fields as $field) {
            if (str_contains($passport, $field)) {
                ++$count;
            }
        }

        if ($count === count($this->fields)) {
            return true;
        }

        return false;
    }

    private function isValid(string $field, $value): bool
    {
        if ('byr' === $field) {
            return $value >= 1920 && $value <= 2002;
        }

        if ('iyr' === $field) {
            return $value >= 2010 && $value <= 2020;
        }

        if ('eyr' === $field) {
            return $value >= 2020 && $value <= 2030;
        }

        if ('hgt' === $field) {
            if (str_contains($value, 'cm')) {
                $hgt = substr($value, 0, strlen($value) - 2);

                return $hgt >= 150 && $hgt <= 193;
            }

            if (str_contains($value, 'in')) {
                $hgt = substr($value, 0, strlen($value) - 2);

                return $hgt >= 59 && $hgt <= 76;
            }

            return false;
        }

        if ('hcl' === $field) {
            return 1 === preg_match('/[#a-f0-9]{7}/', $value);
        }

        if ('ecl' === $field) {
            return in_array($value, ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth']);
        }

        if ('pid' === $field) {
            return is_numeric($value) && 9 === strlen($value);
        }

        return false;
    }
}
