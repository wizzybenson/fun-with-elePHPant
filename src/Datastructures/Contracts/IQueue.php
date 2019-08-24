<?php declare(strict_types = 1);

namespace FunwithelePHPant\Datastructures\Contracts;

use FunwithelePHPant\Datastructures\LinkedList\ANode as Node;

interface IQueue 
{
	public function isEmpty() : bool;
	public function size() : int;
	public function enqueue(Node $node);
	public function dequeue() : ?Node;
	public function peek() : ?Node;
}