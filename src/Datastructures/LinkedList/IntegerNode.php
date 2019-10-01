<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 06/09/19
 * Time: 11:49 م
 */

namespace FunwithelePHPant\Datastructures\LinkedList;


class IntegerNode extends ANode
{

    /**
     * @param $item
     */
    public function validateNodeItemType($item): void
    {
        if (!is_int($item)) {

            throw new \InvalidArgumentException("Function " . __FUNCTION__ . " in Class " . static::class . " expects integer " . gettype($item) . " given");

        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->item;
    }
}