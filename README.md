Advent of Code 2020
----
This repo houses my solutions of [advent of Code 2020](https://adventofcode.com/2020) puzzle.

This project uses the `Symfony\Console` component

### Requirements:
- composer
- php 7

### Usage: 
1. clone the repo & cd into the directory i.e
    - `$ git clone https://github.com/tshiamobhuda/advent-of-code-2020.git`
    - `$ cd advent-of-code-2020`
2. use composer to install all dependencies
    - `$ composer install`
3. run the aoc command in this fashion: `bin/aoc <day> [<part>]` where `<day>` is the puzzle day & `[<part>]` part is the puzzle part (part a or b) which is set to `a` by default i.e:
    - `$ bin/aoc 1` will run day 1 part a
    - `$ bin/aoc 1 b` will run day 1 part b
4. You can also use example input by passing the `-t` option to the command i.e
    - `$ bin/aoc 1 -t` will run day 1 part a with example input stored at `src/Resources/test/day1.txt`
