<?php


namespace FunwithelePHPant\Algorithms;


use PHPUnit\Framework\TestCase;

class PalindromeTest extends TestCase
{
    /**
     * @dataProvider providePalindromeData
     * @param $str
     * @param $expected
     */
    public function test_isPalindrome($str, $expected){
        $palindrome = new Palindrome();
        $result = $palindrome->isPalindrome($str);
        $this->assertSame($expected, $result);
    }

    /**
     * @return array
     */
    public function providePalindromeData() : array
    {
        return [
            ["anna", true],
            ["civic", true],
            ["kayak", true],
            ["return", false],
            ["", true],
            ["m", true]
        ];
    }
}