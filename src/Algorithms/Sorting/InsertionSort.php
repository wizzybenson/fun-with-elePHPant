<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 19/11/19
 * Time: 06:48 م
 */

namespace FunwithelePHPant\Algorithms\Sorting;

use FunwithelePHPant\Algorithms\Contracts\Sorter;
use FunwithelePHPant\Algorithms\Contracts\Comparable;

class InsertionSort implements Sorter
{
    public function sort(array &$comparables): void
    {
        $len = count($comparables);
        for ($i = 1; $i < $len; $i++) {
            for ($j = $i; $j > 0 && $this->less($comparables[$j], $comparables[$j-1]); $j--) {
               $this->exchange($comparables, $j, $j-1);
            }
        }

    }
    public function exchange(array &$comparables, int $i, int $j): void
    {
        $temp = $comparables[$i];
        $comparables[$i] = $comparables[$j];
        $comparables[$j] = $temp;

    }
    public function less(Comparable $v, Comparable $w): bool
    {
        return $v->compareTo($w) < 0;
    }

}