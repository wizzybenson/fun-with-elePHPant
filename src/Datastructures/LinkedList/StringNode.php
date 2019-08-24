<?php declare(strict_types = 1);

namespace FunwithelePHPant\Datastructures\LinkedList;

class StringNode extends ANode
{

	public function validateNodeItemType($item) : void
	{
		if (!is_string($item)) {

			throw new InvalidArgumentException("Function ".__FUNCTION__." in Class ".static::class." expects string ".gettype($item)." given");
			
		}
	}

	public function __toString()
	{
		return $this->item;
	}
}