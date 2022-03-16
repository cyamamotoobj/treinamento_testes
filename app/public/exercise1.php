<?php

include ('/app/src/Exercises/Exercise1/Multiples3Or5Exercise.php');
include ('/app/src/Math/Calculate.php');

$exercise = new App\Exercises\Exercise1\Multiples3Or5Exercise();
$nl = (isset($_SERVER['REQUEST_METHOD'])) ? "<br/>" : PHP_EOL;

echo 'Qual é o valor da soma de todos os números múltiplos de 3 ou 5 de números naturais abaixo de 1000?' . $nl;
echo 'R: ' . $exercise->sumMultiples3Or5LessThen1000([1,2]) . $nl;
echo $nl;

echo 'Qual é o valor da soma de todos os números múltiplos de 3 e 5 de números naturais abaixo de 1000?' . $nl;
echo 'R: ' . $exercise->sumMultiples3And5LessThen1000([1,2]) . $nl;
echo $nl;

echo 'Qual é o valor da soma de todos os números múltiplos de (3 ou 5) e 7 de números naturais abaixo de 1000?' . $nl;
echo 'R: ' . $exercise->sumMultiples3Or5And7LessThen1000([1,2]) . $nl;
echo $nl;





