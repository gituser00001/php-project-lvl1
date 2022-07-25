<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN_NUM = 1;
const MAX_NUM = 100;

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }

    $divisor = 2;

    while ($divisor <= $number / 2) {
        if ($number % $divisor === 0) {
            return false;
        }

        $divisor += 1;
    }

    return true;
}

function play()
{
    $roundData = function () {
        $randomNum = rand(MIN_NUM, MAX_NUM);
        $question = "$randomNum";
        $answer = isPrime($randomNum) ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };
    run(DESCRIPTION, $roundData);
}
