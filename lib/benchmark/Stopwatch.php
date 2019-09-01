<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 26/08/19
 * Time: 10:08 م
 */

namespace FunwithelePHPant\Benchmark\Framework;


class Stopwatch
{
    private $start = 0.0;

    public function __construct()
    {
        $this->start = microtime(true);
    }

    public function elapsedTime(): float
    {
        $now = microtime(true);
        return $now - $this->start;
    }
}