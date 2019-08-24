<?php declare(strict_types = 1);

namespace FunwithelePHPant\Datastructures\LinkedList;

use PHPUnit\Framework\TestCase;

class LinkedListAsQueueTest extends TestCase 
{
	public function test_Can_New_Up_LinkedList()
	{
		$queue = new LinkedList();
		$this->assertTrue($queue instanceof LinkedList,'Hooray, we have a queue');
	}

	public function test_Can_Make_A_queue_Of_Strings()
	{
		$queue = new LinkedList();
		$arrOfStringsBefore = ['to','be','or','not','to','be'];
		foreach ($arrOfStringsBefore as $item) {
			$queue->enqueue(new StringNode($item));
		}

		$arrOfStringsAfter = [];

		while(!$queue->isEmpty()) {
			array_push($arrOfStringsAfter, ($queue->dequeue())->item);
		}

		$this->assertTrue($arrOfStringsBefore === $arrOfStringsAfter, ' can make queue of StringNodes');
	}
}