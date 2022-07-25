<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

const DESCRIPTION = 'What is the result of the expression?';
const MIN_NUM = 1;
const MAX_NUM = 50;
const OPERATION = ['+', '-', '*'];

function calculate(int $num1, int $num2, string $operation)
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
    }
}

function play()
{
    $roundData = function () {
        $randNum1 = rand(MIN_NUM, MAX_NUM);
        $randNum2 = rand(MIN_NUM, MAX_NUM);
        $operation = OPERATION[array_rand(OPERATION)];
        return [
        'question' => "$randNum1 $operation $randNum2",
        'answer' => (string) calculate($randNum1, $randNum2, $operation)
        ];
    };
    run(DESCRIPTION, $roundData);
}
