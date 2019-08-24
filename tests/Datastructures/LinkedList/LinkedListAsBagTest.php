<?php declare(strict_types = 1);

namespace FunwithelePHPant\Datastructures\LinkedList;

use PHPUnit\Framework\TestCase;

class LinkedListAsBagTest extends TestCase 
{
	protected $bag;

	public function setUp() : void
	{
		$this->bag = new LinkedList();
	}

	public function test_Can_New_Up_LinkedList()
	{
		$this->assertTrue($this->bag instanceof LinkedList,'Hooray, we have a bag');
	}

	public function test_Can_Make_A_Bag_Of_Strings()
	{
		$arrOfStringsBefore = ['to','be','or','not','to','be'];
		foreach ($arrOfStringsBefore as $item) {
			$this->bag->add(new StringNode($item));
		}

		$arrOfStringsAfter = [];

		foreach ($this->bag as $key => $item) {
			array_unshift($arrOfStringsAfter,$item);
		}

		$this->assertTrue($arrOfStringsBefore === $arrOfStringsAfter, 'Bag can store StringNodes');
	}

}