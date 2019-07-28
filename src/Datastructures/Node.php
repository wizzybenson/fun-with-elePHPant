<?php
namespace FunwithelePHPant\Datastructures;

class Node {
	public $item = null;
	public $next = null;

	public function __construct($item = null) {
		$this->item = $item;
	}
} 