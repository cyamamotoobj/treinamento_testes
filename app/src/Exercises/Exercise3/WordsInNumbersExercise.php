<?php

namespace App\Exercises\Exercise3;

use App\Math\Calculate;
use App\Exercises\Exercise2\HappyNumbersExercise;

class WordsInNumbersExercise
{

    private $alphabetArray = [];

    public function __construct()
    {
        $this->alphabetArray = array_merge(range('a','z'), range('A','Z'));
    }

    public function isHappyWordValue(string $word) 
    {
        $wordValue = $this->sumWordLetters($word);

        $exercise = new HappyNumbersExercise();

        return $exercise->isHappyNumber($wordValue);
    }

    public function isMultiple3Or5WordValue(string $word) 
    {
        $wordValue = $this->sumWordLetters($word);

        if (Calculate::isMultiple($wordValue, 3) || Calculate::isMultiple($wordValue, 5)) {
            return true;
        }

        return false;
    }

    public function isPrimeWordValue(string $word)
    {       
        $wordValue = $this->sumWordLetters($word);

        return Calculate::isPrimeNumber($wordValue);
    }

    public function sumWordLetters(string $word)
    {
        $letterValues = [];

        foreach (str_split($word) as $letter) {
            $letterValue = array_search($letter, $this->alphabetArray, true);

            if ($letterValue !== false) {
                $letterValues[] = $letterValue+1;
            }
        }

        return Calculate::sum($letterValues);
    }
}
