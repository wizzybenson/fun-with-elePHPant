<?php
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 23/09/19
 * Time: 10:52 م
 */

namespace FunwithelePHPant\Datastructures\UnionFind;


/**
 * Class QuickUnionFind
 * @package FunwithelePHPant\Datastructures\UnionFind
 */
class QuickUnionFind extends UnionFind
{
    /**
     * @param int $id
     * @return int
     */
    public function find(int $id): int
    {
        if (isset($this->ids[$id])) {
            while ($this->ids[$id] !== $id) {
                $id = $this->ids[$id];
            }
            return $id;
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
        $id1Root = $this->find($id1);
        $id2Root = $this->find($id2);

        if ($id1Root == $id2Root) return;

        $this->ids[$id1Root] = $id2Root;
        $this->count--;
    }
}