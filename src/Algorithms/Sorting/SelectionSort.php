<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 19/11/19
 * Time: 05:45 م
 */

namespace FunwithelePHPant\Algorithms\Sorting;

use FunwithelePHPant\Algorithms\Contracts\Sorter;
use FunwithelePHPant\Algorithms\Contracts\Comparable;

class SelectionSort implements Sorter
{
    public function sort(array &$comparables): void
    {
        $len = count($comparables);
        for ($i = 0; $i < $len; $i++) {
            $min = $i;
            for ($j = $i+1; $j < $len; $j++) {
                if ($this->less($comparables[$j], $comparables[$min])) {
                    $min = $j;
                }
            }
            $this->exchange($comparables, $i, $min);
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
        return $v->compareTo($w) < 0 ? true : false;
    }

}