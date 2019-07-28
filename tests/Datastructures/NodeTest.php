<?php
namespace FunwithelePHPant\Datastructures;

use PHPUnit\Framework\TestCase;

class NodeTest extends TestCase {
	
	public function testCanCreateNode() {
		$node = new Node();
		$this->assertTrue($node instanceof Node,'Node cannot be created');
	}

	public function testNodeItemPropertyExists() {
		$node = new Node();
		$this->assertTrue(property_exists($node,'item'), 'item attribute is missing in Node');
	}

	public function testNodeNextPropertyExists() {
		$node = new Node();
		$this->assertTrue(property_exists($node,'next'), 'next attribute is missing in Node');
	}


}