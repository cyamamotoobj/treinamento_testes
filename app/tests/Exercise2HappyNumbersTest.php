<?php

use PHPUnit\Framework\TestCase;
use App\Exercises\Exercise2\HappyNumbersExercise;

class Exercise2HappyNumbersTest extends TestCase
{

    /**
     * @covers HappyNumbersExercise::isHappyNumber
     */
    public function testIsHappyNumber()
    {
        $exercise = new HappyNumbersExercise();

        self::assertTrue($exercise->isHappyNumber(7));
        self::assertTrue($exercise->isHappyNumber(1));
        self::assertFalse($exercise->isHappyNumber(2));
        self::assertFalse($exercise->isHappyNumber(69));
    }

    /**
     * @covers HappyNumbersExercise::splitPowSum
     */
    public function testSplitPowSum(): void
    {
        $exercise = new HappyNumbersExercise();

        self::assertEquals(49, $exercise->splitPowSum(7,2));
    }

    /**
     * @covers HappyNumbersExercise::isUsedNumber
     */
    public function testIsUsedNumber(): void
    {
        $exercise = new HappyNumbersExercise();

        self::assertTrue($exercise->isUsedNumber(7,[7]));
        self::assertFalse($exercise->isUsedNumber(7,[]));
    }

    /**
     * @covers HappyNumbersExercise::isFinalNumber
     */
    public function testIsFinalNumber(): void
    {
        $exercise = new HappyNumbersExercise();

        self::assertTrue($exercise->isFinalNumber(1));
        self::assertFalse($exercise->isFinalNumber(7));
    }
}