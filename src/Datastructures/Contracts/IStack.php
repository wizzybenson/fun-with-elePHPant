<?php declare(strict_types=1);

namespace FunwithelePHPant\Datastructures\Contracts;

use FunwithelePHPant\Datastructures\LinkedList\ANode as Node;

/**
 * Interface IStack
 * @package FunwithelePHPant\Datastructures\Contracts
 */
interface IStack
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
     */
    public function push(Node $node): void;

    /**
     * @return Node|null
     */
    public function pop(): ?Node;

    /**
     * @return Node|null
     */
    public function peek(): ?Node;
}