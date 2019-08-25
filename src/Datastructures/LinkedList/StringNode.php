<?php declare(strict_types=1);

namespace FunwithelePHPant\Datastructures\LinkedList;

/**
 * Class StringNode
 * @package FunwithelePHPant\Datastructures\LinkedList
 */
class StringNode extends ANode
{

    /**
     * @param $item
     */
    public function validateNodeItemType($item): void
    {
        if (!is_string($item)) {

            throw new \InvalidArgumentException("Function " . __FUNCTION__ . " in Class " . static::class . " expects string " . gettype($item) . " given");

        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->item;
    }
}