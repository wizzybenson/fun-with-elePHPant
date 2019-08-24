<?php declare(strict_types = 1);

namespace FunwithelePHPant\Datastructures\LinkedList;

use PHPUnit\Framework\TestCase;

class LinkedListAsStackTest extends TestCase 
{
	public function testCanNewUpLinkedList()
	{
		$stack = new LinkedList();
		$this->assertTrue($stack instanceof LinkedList,'Hooray, we have a stack');
	}

	public function test_Can_Make_A_stack_Of_Strings()
	{
		$stack  = new LinkedList();
		$arrOfStringsBefore = ['to','be','or','not','to','be'];
		foreach ($arrOfStringsBefore as $item) {
			$stack->push(new StringNode($item));
		}

		$arrOfStringsAfter = [];

		while(!$stack->isEmpty()) {
			array_push($arrOfStringsAfter, ($stack->pop())->item);
		}

		$this->assertTrue($arrOfStringsBefore === array_reverse($arrOfStringsAfter), ' can make stacks of StringNodes');
	}
}