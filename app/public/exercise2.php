<?php

include ('/app/src/Exercises/Exercise2/HappyNumbersExercise.php');
include ('/app/src/Math/Calculate.php');

$exercise = new App\Exercises\Exercise2\HappyNumbersExercise();
$nl = (isset($_SERVER['REQUEST_METHOD'])) ? "<br/>" : PHP_EOL;

$number = $argv[1] ?? 7;

$response = $exercise->isHappyNumber($number) ? 'Sim' : 'Não';

echo "O número {$number} é feliz?" . $nl;
echo "R: {$response} {$nl}";





