<?php declare(strict_types = 1);

namespace FunwithelePHPant\Datastructures\Contracts;

use FunwithelePHPant\Datastructures\LinkedList\ANode as Node;

interface IBag 
{
	public function isEmpty() : bool;
	public function size() : int;
	public function add(Node $node);
}