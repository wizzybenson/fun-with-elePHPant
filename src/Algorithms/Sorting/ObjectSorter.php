<?php
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 03/10/19
 * Time: 08:41 م
 */

namespace FunwithelePHPant\Algorithms\Sorting;

use FunwithelePHPant\Algorithms\Contracts\Sorter;

class ObjectSorter
{
    public static function sort(array &$comparables, Sorter $sort_strategy)
    {
        $sort_strategy.sort($comparables);
    }
}