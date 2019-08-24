<?php declare(strict_types = 1);

namespace FunwithelePHPant\Datastructures\Contracts;

use FunwithelePHPant\Datastructures\LinkedList\ANode as Node;

interface IStack 
{
	public function isEmpty() : bool;
	public function size() : int;
	public function push(Node $node) : void;
	public function pop() : ?Node;
	public function peek() : ?Node;
}