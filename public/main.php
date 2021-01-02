<?php declare(strict_types = 1);

require 'autoload.php';
use FunwithelePHPant\Datastructures\LinkedList\{LinkedList, StringNode};
use FunwithelePHPant\Config\Config;

//$stack = new LinkedList();
//stream_set_blocking(STDIN, 0);

class Node {
     public $val = null;
     public $prev = null;
     public $next = null;
     public $child = null;
     function __construct($val = 0) {
        $this->val = $val;
        $this->prev = null;
        $this->next = null;
        $this->child = null;
     }
 }

 $a = new Node(1);
 $b = new Node(2);
 $c = new Node(6);
 $d = new Node(7);
 $e = new Node(3);

 $a->next = $b;
 $b->prev = $a;
 $b->child = $c;
 $b->next = $e;
 $e->prev = $b;
 $b->child->next = $d;
 $d->prev = $b->child;

function flatten($head) {
   $flathead = recFlatten($head);
   return $flathead;
}

function recFlatten($flatHead) {
    if (!$flatHead) return $flatHead;
    $down = recFlatten($flatHead->child);
    $right = recFlatten($flatHead->next);
    if ($down !== null) {
        $curr = $down;
        while ($curr->next !== null) $curr = $curr->next;

        if ($right !== null) {
            $curr->next = $right;
            $right->prev = $curr;
        }
        $flatHead->next = $down;
        $down->prev = $flatHead;
        $flatHead->child = null;
    }
    return $flatHead;
}

var_dump(flatten($a));
