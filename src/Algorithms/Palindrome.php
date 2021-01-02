<?php


namespace FunwithelePHPant\Algorithms;


class Palindrome
{
    public function isPalindrome(string $str) : bool
    {
        if (strlen($str) == 0 || strlen($str) == 1) return true;
        return $str[0] == $str[strlen($str) - 1] && $this->isPalindrome(substr($str,1,strlen($str) - 2));
    }
}