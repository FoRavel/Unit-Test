<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\User;

require("./vendor/autoload.php");

class UserTest extends TestCase
{
    /**
     * @dataProvider isFirstNameValidProvider
     */
    public function testIsFirstNameValid($value, $expected)
    {
        $this->assertSame($expected, $value);
    }
    /**
     * @dataProvider isLastNameValidProvider
     */
    public function testIsLastNameValid($value, $expected)
    {
        $this->assertSame($expected, $value);
    }
    /**
     * @dataProvider isEmailValidProvider
     */
    public function testIsEmailValid($value, $expected)
    {
        $this->assertSame($expected, $value);
    }
    /**
     * @dataProvider isAgeValidProvider
     */
    public function testIsAgeValid($value, $expected)
    {
        $this->assertSame($expected, $value);
    }
    public function testIsValid()
    {
        $user = new User("Fanilo", "RAVELOSON", "raveloson.fanilo@gmail.com", 25);
        $this->assertSame(true, $user->isValid());
    }
    

    public function isFirstNameValidProvider()
    {
        $caseOne = new User("Fanilo", "RAVELOSON", "raveloson.fanilo@gmail.com", "25");
        $caseTwo = new User("Fanil", "RAVELOSON", "raveloson.fanilo@gmail.com", "25");
        $caseThree = new User(2, "RAVELOSON", "raveloson.fanilo@gmail.com", "25");
        return [
            'if lastName is a string and length >= 6  expect true'  => [$caseOne->isFirstNameValid(), true],
            'if lastName length < 6 expect false' => [$caseTwo->isFirstNameValid(), false],
            'if lastName is not a string expect false' => [$caseThree->isFirstNameValid(), false]
        ];
    }
    public function isLastNameValidProvider()
    {
        $caseOne = new User("Fanilo", "RAVELOSON", "raveloson.fanilo@gmail.com", "25");
        $caseTwo = new User("Fanilo", "RAVELOSO", "raveloson.fanilo@gmail.com", "25");
        $caseThree = new User(2, "RAVELOSON", "raveloson.fanilo@gmail.com", "25");
        return [
            'if lastName is a string and length >= 9 expect true'  => [$caseOne->isLastNameValid(), true],
            'if lastName length < 9 expect false' => [$caseTwo->isLastNameValid(), false],
            'if lastName is not a string expect false' => [$caseThree->isLastNameValid(), false]
        ];
    }
    public function isEmailValidProvider()
    {
        $caseOne = new User("Fanilo", "RAVELOSON", "raveloson.fanilo@gmail.com", "25");
        $caseTwo = new User("Fanilo", "RAVELOSO", "raveloson.fanilogmail.com", "25");
        return [
            'if email include @ expect true'  => [$caseOne->isLastNameValid(), true],
            'if email does not include @ expect false' => [$caseTwo->isLastNameValid(), false]
        ];
    }
    public function isAgeValidProvider()
    {
        $caseOne = new User("Fanilo", "RAVELOSON", "raveloson.fanilo@gmail.com", 25);
        $caseTwo = new User("Fanilo", "RAVELOSON", "raveloson.fanilogmail.com", 12);
        $caseThree = new User("Fanilo", "RAVELOSON", "raveloson.fanilogmail.com", "25");
        return [
            'if age is > 13 and is a number expect true'  => [$caseOne->isAgeValid(), true],
            'if age is < 13 expect false' => [$caseTwo->isAgeValid(), false],
            'if age is is not a number expect false' => [$caseThree->isAgeValid(), false]
        ];
    }
}
