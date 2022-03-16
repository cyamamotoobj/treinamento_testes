<?php

namespace App\Exercises\Exercise2;

use App\Math\Calculate;

class HappyNumbersExercise
{

    private $usedNumbers = [];

    public function isHappyNumber(int $number)
    {
        if ($this->isUsedNumber($number, $this->usedNumbers)) {
            $this->usedNumbers = [];
            return false;
        }

        if ($this->isFinalNumber($number)) {
            $this->usedNumbers = [];
            return true;
        }

        $this->usedNumbers[] = $number;

        return self::isHappyNumber($this->splitPowSum($number, 2));
    }

    public function splitPowSum(int $baseNumber, int $expValue)
    {
        $valuesToSum = [];

        foreach (str_split($baseNumber) as $value) {
            $valuesToSum[] = pow($value, $expValue);
        }

        return Calculate::sum($valuesToSum);
    }

    public function isUsedNumber(int $number, array $usedNumbers) 
    {
        if (in_array($number, $usedNumbers)) {
            return true;
        }

        return false;
    }

    public function isFinalNumber(int $number) 
    {
        if ($number == 1) {
            return true;
        }

        return false;
    }
}
