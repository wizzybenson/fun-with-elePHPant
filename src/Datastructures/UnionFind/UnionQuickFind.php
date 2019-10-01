<?php
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 23/09/19
 * Time: 10:52 م
 */

namespace FunwithelePHPant\Datastructures\UnionFind;


/**
 * Class UnionQuickFind
 * @package FunwithelePHPant\Datastructures\UnionFind
 */
class UnionQuickFind extends UnionFind
{
    /**
     * @param int $id
     * @return int
     */
    public function find(int $id): int
    {
        if (isset($this->ids[$id])) {
            return $this->ids[$id];
        } else {
            throw new \OutOfBoundsException("$id must be a valid key");
        }
    }

    /**
     * @param int $id1
     * @param int $id2
     */
    public function union(int $id1, int $id2): void
    {
       $id1Parent = $this->find($id1);
       $id2Parent = $this->find($id2);

       if ($id1Parent == $id2Parent) return;

       foreach ($this->ids as $id => $parent) {
           if ($parent == $id1Parent) {
               $this->ids[$id] = $id2Parent;
           }
       }
       $this->count--;
    }
}