<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN_NUM = 1;
const MAX_NUM = 50;

function isEven(int $num): string
{
    return ($num % 2 === 0 ? 'yes' : 'no');
}

function play()
{
    $roundData = function () {
        $question = rand(MIN_NUM, MAX_NUM);
        $answer = isEven($question);
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };
    run(DESCRIPTION, $roundData);
}
