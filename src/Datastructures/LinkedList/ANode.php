<?php declare(strict_types = 1);

namespace FunwithelePHPant\Datastructures\LinkedList;

abstract class ANode
{
	public $item;
	public $next = null;

	public function __construct($item)
	{
		$this->validateNodeItemType($item);
		$this->item = $item;
	}
	abstract protected function validateNodeItemType($item) : void;
} 