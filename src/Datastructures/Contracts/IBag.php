<?php declare(strict_types=1);

namespace FunwithelePHPant\Datastructures\Contracts;

use FunwithelePHPant\Datastructures\LinkedList\ANode as Node;

/**
 * Interface IBag
 * @package FunwithelePHPant\Datastructures\Contracts
 */
interface IBag
{
    /**
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * @return int
     */
    public function size(): int;

    /**
     * @param Node $node
     * @return mixed
     */
    public function add(Node $node);
}