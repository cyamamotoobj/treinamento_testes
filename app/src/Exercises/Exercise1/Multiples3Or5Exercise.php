<?php

namespace App\Exercises\Exercise1;

use App\Math\Calculate;

class Multiples3Or5Exercise {

    public function sumMultiples3Or5LessThen1000() 
    {
        $sum = 0;

        for ($num = 0; $num < 1000; $num++) {
            if (Calculate::isMultiple($num, 3) || Calculate::isMultiple($num, 5)) {
                $sum = Calculate::sum([$sum, $num]);
            }
        }

        return $sum;
    }

    public function sumMultiples3And5LessThen1000() 
    {
        $sum = 0;

        for ($num = 0; $num < 1000; $num++) {
            if (Calculate::isMultiple($num, 3) && Calculate::isMultiple($num, 5)) {
                $sum = Calculate::sum([$sum, $num]);
            }
        }

        return $sum;
    }

    public function sumMultiples3Or5And7LessThen1000() 
    {
        $sum = 0;

        for ($num = 0; $num < 1000; $num++) {
            if ((Calculate::isMultiple($num, 3) || Calculate::isMultiple($num, 5)) && Calculate::isMultiple($num, 7)) {
                $sum = Calculate::sum([$sum, $num]);
            }
        }

        return $sum;
    }

}