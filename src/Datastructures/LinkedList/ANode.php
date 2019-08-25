<?php declare(strict_types=1);

namespace FunwithelePHPant\Datastructures\LinkedList;

/**
 * Class ANode
 * @package FunwithelePHPant\Datastructures\LinkedList
 */
abstract class ANode
{
    public $item;
    public $next = null;

    /**
     * ANode constructor.
     * @param $item
     */
    public function __construct($item)
    {
        $this->validateNodeItemType($item);
        $this->item = $item;
    }

    /**
     * @param $item
     */
    abstract protected function validateNodeItemType($item): void;
} 