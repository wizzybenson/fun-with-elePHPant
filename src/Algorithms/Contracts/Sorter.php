<?php
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 03/10/19
 * Time: 08:12 م
 */

namespace FunwithelePHPant\Algorithms\Contracts;


interface Sorter
{
    public function sort(array &$comparables): void;
    public function exchange(array &$comparables, int $i, int $j): void;
    public function less(Comparable $v, Comparable $w): bool;

}