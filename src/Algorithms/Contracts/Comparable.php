<?php
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 03/10/19
 * Time: 08:16 م
 */

namespace FunwithelePHPant\Algorithms\Contracts;


interface Comparable
{
    public function compareTo(Comparable $that): int;
}