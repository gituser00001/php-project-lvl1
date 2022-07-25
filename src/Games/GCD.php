<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\run;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MIN_NUM = 1;
const MAX_NUM = 100;

function gcd(int $a, int $b)
{
    while ($b !== 0) {
        $remainder = $a % $b;
        $a = $b;
        $b = $remainder;
    }
    return $a;
}

function play()
{
    $roundData = function () {
        $num1 = rand(MIN_NUM, MAX_NUM);
        $num2 = rand(MIN_NUM, MAX_NUM);
        $question = "$num1 $num2";
        $answer = (string) gcd($num1, $num2);
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };
    run(DESCRIPTION, $roundData);
}
