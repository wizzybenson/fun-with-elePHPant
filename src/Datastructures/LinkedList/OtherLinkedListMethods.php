<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 04/09/19
 * Time: 10:35 م
 */

namespace FunwithelePHPant\Datastructures\LinkedList;

use FunwithelePHPant\Datastructures\LinkedList\ANode as Node;

/**
 * Class OtherLinkedListMethods
 * @package FunwithelePHPant\Datastructures\LinkedList
 */
class OtherLinkedListMethods extends LinkedList
{
    /**
     * Write a method delete() that takes an int argument k and deletes the k th ele-
     * ment in a linked list, if it exists.
     *
     * @param int $k
     */
    public function delete(int $k): void
    {
        $size = $this->size();
        if ($k <= 0 || $k > $size) {
            return;
        }
        if ($k == $size) {
            $this->delete_last();
            return;
        } else if ($k == 1) {
            $this->delete_first();
            return;
        } else {
            $this->delete_middle($k);
            return;
        }
    }

    /**
     * Write a method find() that takes a linked list and a string key as arguments
     * and returns true if some node in the list has key as its item field, false otherwise.
     *
     * @param LinkedList $linkedList
     * @param string $key
     * @return bool
     */
    public function find(LinkedList $linkedList, string $key): bool
    {
        $found = false;
        $current = $linkedList->first;
        while ($current) {
            if ($current->item === $key) {
                $found = true;
                break;
            }
            $current = $current->next;
        }
        return $found;
    }

    /**
     * Write a method removeAfter() that takes a linked-list Node as argument and
     * removes the node following the given one (and does nothing if the argument or the next
     * field in the argument node is null).
     *
     * @param ANode $node
     */
    public function removeAfter(Node $node): void
    {
        if (!$node || !$node->next) {
            return;
        }

        $node->next = $node->next->next;
        $this->shrink();
    }

    /**
     * Write a method insertAfter() that takes two linked-list Node arguments and
     * inserts the second after the first on its list (and does nothing if either argument is null).
     *
     * @param ANode $first
     * @param ANode $second
     */
    public function insertAfter(Node $first, Node $second): void
    {
        if (!$first || !$second) {
            return;
        }

        $old_first_next = $first->next;
        $first->next = $second;
        $second->next = $old_first_next;
        $this->grow();
    }

    /**
     * Write a method remove() that takes a linked list and a string key as arguments
     * and removes all of the nodes in the list that have key as its item field.
     *
     * @param LinkedList $linkedList
     * @param string $key
     */
    public function remove(LinkedList $linkedList, string $key): void
    {
        if (!$linkedList->first) return;
        $previous  = null;
        $current = $linkedList->first;
        while ($current) {
            if ($current->item === $key) {
                if ($current == $linkedList->first) {
                    if ($linkedList->first == $linkedList->last) {
                        $current = $linkedList->first = $linkedList->last = $linkedList->first->next;
                        $linkedList->shrink();
                    } else {
                        $current = $linkedList->first = $linkedList->first->next;;
                        $linkedList->shrink();
                    }
                } else {
                    $current = $previous->next = $current->next;
                    $linkedList->shrink();
                }
            } else {
                $previous = $current;
                $current = $current->next;
            }
        }
    }

    /**
     * Write a method max() that takes a reference to the first node in a linked list as
     * argument and returns the value of the maximum key in the list. Assume that all keys are
     * positive integers, and return 0 if the list is empty.
     *
     * @return int
     */
    public function max(Node $first): int
    {
        $max = 0;
        if (!$first) {
            return $max;
        }
       $current = $first;
        while ($current) {
            if ($current->item > $max ) {
                $max = $current->item;
            }

            $current = $current->next;
        }
        return $max;
    }
    /**
     * Write a method max() that takes a reference to the first node in a linked list as
     * argument and returns the value of the maximum key in the list. Assume that all keys are
     * positive integers, and return 0 if the list is empty.
     *
     * @return int
     */
    public function maxRecursive(?Node $first, $max = 0): int
    {
        if (!$first) {
            return $max;
        }

        return $this->maxRecursive($first->next, max($first->item,$max));
    }
    public function delete_first(): void
    {
        if (!$this->first) {
            return;
        }
        if ($this->first == $this->last) {
            $this->first = $this->first->next;
            $this->last = $this->first;
            $this->shrink();
            return;
        }
        $this->first = $this->first->next;
        $this->shrink();
        return;
    }

    public function delete_middle(int $k): void
    {
        $previous = null;
        $current = $this->first;
        $counter = 1;

        while ($counter < $k) {
            $previous = $current;
            $current = $current->next;
            $counter++;
        }

        $previous->next = $current->next;
        $this->shrink();
    }

    public function delete_last(): void
    {
        $previous = null;
        $current = $this->first;

        while ($current->next) {
            $previous = $current;
            $current = $current->next;
        }

        $previous->next = null;
        $this->shrink();
    }

    public function reverse(?Node $x): ?Node
    {
        $first = $x;
        $reverse = null;

        while($first) {
            $second = $first->next;
            $first->next = $reverse;
            $reverse = $first;
            $first = $second;
        }

        if ($this->first == $x) {
            $this->last = $this->first;
            $this->first = $reverse;
        }

        return $reverse;
    }

    public function reverseRecursive(?Node $first): ?Node
    {
        if (!$first) return null;
        if (!$first->next) return $first;
        $second = $first->next;
        $rest = $this->reverseRecursive($second);
        $second->next = $first;
        $first->next = null;
        return $rest;
    }
}