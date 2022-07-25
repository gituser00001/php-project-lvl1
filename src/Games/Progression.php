<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function getProgression()
{
    $start = rand(2, 50);
    $result[] = $start;
    for ($i = 0, $difference = rand(1, 5); $i < 9; $i++) {
        $start += $difference;
        $result[] = $start;
    }
    return $result;
}

function play()
{
    $roundData = function () {
        $progression = getProgression();
        $randNum = $progression[rand(2, 10)];
        $question = implode(' ', str_replace($randNum, '..', $progression));
        $answer = (string) $randNum;
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };
    run(DESCRIPTION, $roundData);
}
