<?php

use PHPUnit\Framework\TestCase;
use App\Exercises\Exercise1\Multiples3Or5Exercise;

class Exercise1Multiples3Or5Test extends TestCase
{

    /**
     * @covers Multiples3Or5Exercise::sumMultiples3Or5LessThen1000
     */
    public function testSumMultiplesOf3Or5LessThen1000(): void
    {
        $exercise = new Multiples3Or5Exercise();

        $sum = $exercise->sumMultiples3Or5LessThen1000();

        self::assertEquals(233168,$sum);
    }

    /**
     * @covers Multiples3Or5Exercise::sumMultiples3And5LessThen1000
     */
    public function testSumMultiplesOf3And5LessThen1000(): void
    {
        $exercise = new Multiples3Or5Exercise();

        $sum = $exercise->sumMultiples3And5LessThen1000();

        self::assertEquals(33165,$sum);
    }

    /**
     * @covers Multiples3Or5Exercise::sumMultiples3Or5And7LessThen1000
     */
    public function testSumMultiplesOf3Or5And7LessThen1000(): void
    {
        $exercise = new Multiples3Or5Exercise();

        $sum = $exercise->sumMultiples3Or5And7LessThen1000();

        self::assertEquals(33173,$sum);
    }
}