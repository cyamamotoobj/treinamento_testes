<?php

namespace App\Math;

class Calculate {

    public static function isMultiple(int $num, int $multipleNum) 
    {
        if ($num == 0) {
            return false;
        }

        return ($num % $multipleNum) == 0 ? true : false;
    }

    public static function sum(array $numbers): int
    {
        $sum = 0;

        foreach ($numbers as $number) {
            if (is_numeric($number)) {
                $sum += $number;
            }
        }

        return $sum;
    }

    public static function isPrimeNumber(int $num) 
    {
        for ($multiple = 2; $multiple < $num; $multiple++) {
            if (Calculate::isMultiple($num, $multiple)) {
                return false;
            }
        }

        return true;
    }

}