<?php

include ('/app/src/Exercises/Exercise2/HappyNumbersExercise.php');
include ('/app/src/Exercises/Exercise3/WordsInNumbersExercise.php');
include ('/app/src/Math/Calculate.php');

$exercise = new App\Exercises\Exercise3\WordsInNumbersExercise();
$nl = (isset($_SERVER['REQUEST_METHOD'])) ? "<br/>" : PHP_EOL;

$word = $argv[1] ?? 'a';

$response1 = $exercise->sumWordLetters($word);
$response2 = $exercise->isPrimeWordValue($word) ? 'Sim' : 'Não';
$response3 = $exercise->isHappyWordValue($word) ? 'Sim' : 'Não';
$response4 = $exercise->isMultiple3Or5WordValue($word) ? 'Sim' : 'Não';

echo "O valor da palavra '{$word}' é?" . $nl;
echo "R: {$response1} {$nl}";
echo $nl;

echo "O valor da palavra '{$word}' é primo?" . $nl;
echo "R: {$response2} {$nl}";
echo $nl;

echo "O valor da palavra '{$word}' é feliz?" . $nl;
echo "R: {$response3} {$nl}";
echo $nl;

echo "O valor da palavra '{$word}' é múltiplo de 3 ou 5?" . $nl;
echo "R: {$response4} {$nl}";
echo $nl;



