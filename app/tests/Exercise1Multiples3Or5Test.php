<?php

use PHPUnit\Framework\TestCase;
use App\Exercises\Exercise1\Multiples;

class Exercise1Multiples3Or5Test extends TestCase
{

    /**
     * @covers Multiples::sumMultiplesByOperatorLessThen
     */
    public function testSumMultiplesOf3Or5LessThen1000(): void
    {
        $exercise = new Multiples();

        $sum = $exercise->sumMultiplesByOperatorLessThen([
            'or' => [3,5]
        ], 1000);

        self::assertEquals(233168,$sum);
    }

    /**
     * @covers Multiples::sumMultiplesByOperatorLessThen
     */
    public function testSumMultiplesOf3And5LessThen1000(): void
    {
        $exercise = new Multiples();

        $sum = $exercise->sumMultiplesByOperatorLessThen([
            'and' => [3,5]
        ], 1000);

        self::assertEquals(33165,$sum);
    }

    /**
     * @covers Multiples::sumMultiplesByOperatorLessThen
     */
    public function testSumMultiplesOf3Or5And7LessThen1000(): void
    {
        $exercise = new Multiples();

        $sum = $exercise->sumMultiplesByOperatorLessThen([
            'or' => [3,5],
            'and' => [7]
        ], 1000);

        self::assertEquals(33173,$sum);
    }
}