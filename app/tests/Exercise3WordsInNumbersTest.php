<?php

use PHPUnit\Framework\TestCase;
use App\Exercises\Exercise3\WordsInNumbersExercise;

class Exercise3WordsInNumbersTest extends TestCase
{

    /**
     * @covers WordsInNumbersExercise::sumWordLetters
     */
    public function testSumWordLetters()
    {
        $exercise = new WordsInNumbersExercise();

        self::assertEquals(1, $exercise->sumWordLetters('a'));
        self::assertEquals(3, $exercise->sumWordLetters('ab'));
        self::assertEquals(58, $exercise->sumWordLetters('abAB'));
    }

    /**
     * @covers WordsInNumbersExercise::isHappyWordValue
     */
    public function testIsHappyWordValue()
    {
        $exercise = new WordsInNumbersExercise();

        self::assertTrue($exercise->isHappyWordValue('a'));
        self::assertTrue($exercise->isHappyWordValue('af'));
        self::assertFalse($exercise->isHappyWordValue('aa'));
    }

    /**
     * @covers WordsInNumbersExercise::isMultipleWordValue
     */
    public function testIsMultipleOf3Or5WordValue()
    {
        $exercise = new WordsInNumbersExercise();

        self::assertTrue($exercise->isMultipleWordValue([3,5], 'ab'));
        self::assertTrue($exercise->isMultipleWordValue([3,5], 'bc'));
        self::assertFalse($exercise->isMultipleWordValue([3,5], 'ac'));
    }

    /**
     * @covers WordsInNumbersExercise::isPrimeWordValue
     */
    public function testIsPrimeWordValue()
    {
        $exercise = new WordsInNumbersExercise();

        self::assertTrue($exercise->isPrimeWordValue('ab'));
        self::assertTrue($exercise->isPrimeWordValue('acAB'));
        self::assertFalse($exercise->isPrimeWordValue('abAB'));
    }
}