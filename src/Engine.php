<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function run(string $description, callable $genRoundData)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("$description");

    for ($i = 0; $i < 3; $i++) {
        ['question' => $question, 'answer' => $correctAnswer] = $genRoundData();

        line(("Question: {$question}"));
        $answer = prompt('Your answer');

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
