<?php


namespace FunwithelePHPant\Algorithms;


class Power
{
    public function raise(int $base, int $exp, $version = 'v1') : int
    {
        $method_name = 'raise_'.$version;
        if (method_exists($this, $method_name)) {
            return $this->$method_name($base, $exp);
        }
        throw new \BadMethodCallException("Method Power->$method_name does not exist");
    }

    private function raise_v1(int $base, int $exp) : int
    {
        if ($base < 1 || $exp < 0) throw new \InvalidArgumentException("Invalid base $base or exponent $exp");
        if ($exp == 0) return 1;
        return $base * $this->raise_v1($base, $exp-1);
    }

    private function raise_v2(int $base, int $exp) : int
    {
        if ($base < 1 || $exp < 0) throw new \InvalidArgumentException("Invalid base $base or exponent $exp");
        if ($exp == 0) return 1;
        $half = $this->raise_v2($base, $exp/2);
        return $exp % 2 == 0 ? $half * $half : $half * $half * $base;
    }

}