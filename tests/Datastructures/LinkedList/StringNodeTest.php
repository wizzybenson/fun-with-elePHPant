<?php declare(strict_types = 1);

namespace FunwithelePHPant\Datastructures\LinkedList;

use PHPUnit\Framework\TestCase;

class StringNodeTest extends TestCase 
{
	
	public function testCanCreateStringNode() 
	{
		$stringNode = new StringNode('a');
		$this->assertTrue($stringNode instanceof ANode,'StringNode cannot be created');
	}

	public function testStringNodeItemPropertyExists() 
	{
		$stringNode = new StringNode('b');
		$this->assertTrue(property_exists($stringNode,'item') && $stringNode->item === 'b', 'item attribute is missing in StringNode or it\'s not set');
	}

	public function testStringNodeNextPropertyExists() 
	{
		$stringNode = new StringNode('c');
		$this->assertTrue(property_exists($stringNode,'next'), 'next attribute is missing in StringNode');
	}


}