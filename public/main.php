<?php declare(strict_types=1);

require 'autoload.php';

use FunwithelePHPant\Datastructures\LinkedList\{LinkedList, StringNode};
use FunwithelePHPant\Config\Config;

//$stack = new LinkedList();
//stream_set_blocking(STDIN, 0);

class Node
{
    public $val = null;
    public $next = null;
    public $random = null;

    function __construct($val = 0)
    {
        $this->val = $val;
        $this->next = null;
        $this->random = null;
    }
}

$a = new Node(7);
$b = new Node(13);
$c = new Node(11);
$d = new Node(10);
$e = new Node(1);

$a->next = $b;

$b->next = $c;
$b->random = $a;

$c->next = $d;
$c->random = $e;

$d->next = $e;
$d->random = $c;

$e->random = $a;

function copyRandomList($head) {

}

var_dump($a, clone($a));
