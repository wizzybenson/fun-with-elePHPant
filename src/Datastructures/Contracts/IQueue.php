<?php declare(strict_types=1);

namespace FunwithelePHPant\Datastructures\Contracts;

use FunwithelePHPant\Datastructures\LinkedList\ANode as Node;

/**
 * Interface IQueue
 * @package FunwithelePHPant\Datastructures\Contracts
 */
interface IQueue
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
    public function enqueue(Node $node);

    /**
     * @return Node|null
     */
    public function dequeue(): ?Node;

    /**
     * @return Node|null
     */
    public function peek(): ?Node;
}