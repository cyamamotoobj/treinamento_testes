<?php

namespace App\Exercises\Exercise1;

use App\Math\Calculate;

class Multiples {

    public function sumMultiplesByOperatorLessThen(array $multiplesByOperator, int $lessThenValue)
    {
        $sum = 0;

        $hasOrMultiples = (isset($multiplesByOperator['or']) && !empty($multiplesByOperator['or']));
        $hasEndMultiples = (isset($multiplesByOperator['and']) && !empty($multiplesByOperator['and']));

        if ($hasOrMultiples || $hasEndMultiples) {
            for ($num = 1; $num < $lessThenValue; $num++) {
                $orTest = true;
    
                if ($hasOrMultiples) {
                    $orTest = false;
                    if ($this->isMultipleByOperator($num, $multiplesByOperator['or'], 'or')) {
                        $orTest = true;
                    }
                }
    
                $andTest = true;
    
                if ($hasEndMultiples) {
                    if (!$this->isMultipleByOperator($num, $multiplesByOperator['and'], 'and')) {
                        $andTest = false;
                    }
                }
    
                if ($orTest && $andTest) {
                    $sum = Calculate::sum([$sum, $num]);
                }
            }
        }

        return $sum;
    }

    public function isMultipleByOperator(int $number, array $multiples, string $operator) 
    {
        $isMultiple = false;

        if ($operator == 'and') {
            $isMultiple = true;
        }

        foreach ($multiples as $multiple) {
            if ($operator == 'or' && Calculate::isMultiple($number, $multiple)) {
                $isMultiple = true;
            }

            if ($operator == 'and' && !Calculate::isMultiple($number, $multiple)) {
                $isMultiple = false;
            }
        }

        return $isMultiple;
    }

}