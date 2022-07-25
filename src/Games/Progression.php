<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function getProgression()
{
    $start = rand(2, 50);
    $result = [];
    for ($i = 0, $difference = rand(1, 5); $i < 10; $i++) {
        $result[] = $start;
        $start += $difference;
    }
    return $result;
}

function play()
{
    $roundData = function () {
        $progression = getProgression();
        $randNum = $progression[rand(1, 9)];
        $question = implode(' ', str_replace($randNum, '..', $progression));
        $answer = (string) $randNum;
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };
    run(DESCRIPTION, $roundData);
}
