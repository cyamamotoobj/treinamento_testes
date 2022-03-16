<?php

use PHPUnit\Framework\TestCase;
use App\Math\Calculate;

class MathCalculateTest extends TestCase
{

    /**
     * @covers Calculate::isMultiple
     */
    public function testIsMultiple()
    {
        self::assertTrue(Calculate::isMultiple(10, 5));
        self::assertFalse(Calculate::isMultiple(11, 5));
        self::assertFalse(Calculate::isMultiple(0, 5));
    }

    /**
     * @covers Calculate::sum
     */
    public function testSum()
    {
        self::assertEquals(10,Calculate::sum([4,6]));
        self::assertEquals(12,Calculate::sum([6,'A',6]));
        self::assertEquals(0,Calculate::sum(['B','A']));
    }

    /**
     * @covers Calculate::isPrimeNumber
     */
    public function testIsPrimeNumber()
    {
        self::assertTrue(Calculate::isPrimeNumber(2));
        self::assertTrue(Calculate::isPrimeNumber(23));
        self::assertFalse(Calculate::isPrimeNumber(4));
        self::assertFalse(Calculate::isPrimeNumber(40));
    }
}