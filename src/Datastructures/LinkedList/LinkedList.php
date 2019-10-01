<?php declare(strict_types=1);

namespace FunwithelePHPant\Datastructures\LinkedList;

use FunwithelePHPant\Datastructures\Contracts\{IStack, IQueue, IBag};
use FunwithelePHPant\Datastructures\LinkedList\ANode as Node;


/**
 * Class LinkedList
 * @package FunwithelePHPant\Datastructures\LinkedList
 */
class LinkedList implements IBag, IStack, IQueue, \Iterator
{

    protected $first = null;
    protected $last = null;
    protected $size = 0;
    protected $current = null;
    protected $index = 0;

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->first === null;
    }

    /**
     * @return int
     */
    public function size(): int
    {
        return $this->size;
    }

    /**
     * @param ANode $node
     */
    public function add(Node $node)
    {
        $old_first = $this->first;
        $node->next = $old_first;
        $this->first = $node;
        $this->grow();

    }

    /**
     * @param ANode $node
     */
    public function enqueue(Node $node)
    {
        $old_last = $this->last;
        $this->last = $node;

        if ($this->isEmpty()) {
            $this->first = $this->last;
        } else {
            $old_last->next = $this->last;
        }

        $this->grow();
    }

    /**
     * @return ANode|null
     */
    public function dequeue(): ?Node
    {
        $old_first = $this->first;
        $this->first = $this->first->next;

        if ($this->isEmpty()) {
            $this->last = null;
        }

        $this->shrink();

        return $old_first;


    }


    /**
     * @param ANode $node
     */
    public function push(Node $node): void
    {
        $old_first = $this->first;
        $node->next = $old_first;
        $this->first = $node;
        $this->grow();
    }

    /**
     * @return ANode|null
     */
    public function pop(): ?Node
    {
        $old_first = $this->first;
        $this->first = $this->first->next;
        $this->shrink();
        return $old_first;
    }

    /**
     * @return ANode|null
     */
    public function peek(): ?Node
    {
        return $this->first;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->current->item;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->index;
    }

    public function next(): void
    {
        $this->index++;
        $this->current = $this->current->next;
    }

    public function rewind(): void
    {
        $this->index = 0;
        $this->current = $this->first;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return $this->current !== null;
    }

    public function grow(): void
    {
        $this->size++;
    }

    public function shrink(): void
    {
        $this->size--;
    }
}