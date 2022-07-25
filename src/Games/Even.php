<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;

function isEven(int $num): string
{
    return ($num % 2 === 0 ? 'yes' : 'no');
}

function play()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < 3; $i++) {
        $question = rand(1, 99);
        line(("Question: {$question}"));
        $answer = prompt('Your answer');
        $correctAnswer = isEven($question);

        if ($correctAnswer === $answer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
}
