<?php declare(strict_types = 1);

namespace FunwithelePHPant\Datastructures\LinkedList;

use FunwithelePHPant\Datastructures\Contracts\{IStack, IQueue, IBag};
use FunwithelePHPant\Datastructures\LinkedList\ANode as Node;



class LinkedList implements IBag, IStack, IQueue, \Iterator
{

	private $first   = null;
	private $last    = null;
	private $size    = 0;
	private $current = null;
	private $index   = 0; 
	
	public function isEmpty() : bool
	{
		return $this->first === null;
	}

	public function size() : int 
	{
		return $this->size;
	}

	public function add(Node $node) 
	{
		$old_first = $this->first;
		$node->next = $old_first;
		$this->first = $node;
		$this->grow();

	}

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

	public function dequeue() : ?Node
	{
		$old_first = $this->first;
		$this->first = $this->first->next;

		if ($this->isEmpty()) {
			$this->last = null;
		}

		$this->shrink();

		return $old_first; 


	}


	public function push(Node $node) : void
	{
		$old_first = $this->first;
		$node->next = $old_first;
		$this->first = $node;
		$this->grow();
	}

	public function pop() : ?Node
	{
		$old_first = $this->first;
		$this->first = $this->first->next;
		$this->shrink();
		return $old_first;
	}

	public function peek() : ?Node
	{
		return $this->first;
	}

	public function current()
	{
		return $this->current->item;
	}

	public function key() : int 
	{
		return $this->index;
	}

	public function next() : void
	{
		$this->index++;
		$this->current = $this->current->next;
	}

	public function rewind() : void
	{
		$this->index = 0;
		$this->current = $this->first;
	}

	public function valid() : bool
	{
		return $this->current !== null;
	}

	public function grow() : void
	{
		$this->size++;
	}

	public function shrink() : void
	{
		$this->size--;
	}
}