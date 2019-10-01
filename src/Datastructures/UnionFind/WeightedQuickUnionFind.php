<?php
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 23/09/19
 * Time: 11:40 م
 */

namespace FunwithelePHPant\Datastructures\UnionFind;


/**
 * Class WeightedQuickUnionFind
 * @package FunwithelePHPant\Datastructures\UnionFind
 */
class WeightedQuickUnionFind extends UnionFind
{
    protected $weights = [];

    /**
     * @param int $N
     */
    function init(int $N): void
    {
        parent::init($N);
        $this->weights = array_fill(0, $N, 1);
    }

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

        if ($this->weights[$id1Root] < $this->weights[$id2Root]) {
            $this->ids[$id1Root] = $id2Root;
            $this->weights[$id2Root] += $this->weights[$id1Root];
        } else {
            $this->ids[$id2Root] = $id1Root;
            $this->weights[$id1Root] += $this->weights[$id2Root];
        }
        $this->count--;
    }

    /**
     * @param int $site
     * @return int
     */
    public function getWeight(int $site): int
    {
        return $this->weights[$site] ?? 0;
    }
}