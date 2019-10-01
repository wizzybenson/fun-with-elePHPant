<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 07/09/19
 * Time: 12:29 ص
 */

namespace FunwithelePHPant\Datastructures\UnionFind;

use FunwithelePHPant\Datastructures\Contracts\IDisjointSet;


/**
 * Class UnionFind
 * @package FunwithelePHPant\Datastructures\UnionFind
 */
abstract class UnionFind implements IDisjointSet
{
    protected $count = 0;
    protected $ids = [];

    /**
     * UnionFind constructor.
     * @param int $N
     */
    public function __construct(int $N)
    {
        $this->count = $N;
        $this->init($N);
    }

    /**
     * @param int $N
     */
    protected function init(int $N): void
    {
        $this->ids = range(0, $N-1);
    }

    /**
     * @param int $id1
     * @param int $id2
     */
    abstract public function union(int $id1, int $id2): void;

    /**
     * @param int $id
     * @return int
     */
    abstract public function find(int $id): int;

    /**
     * @param int $id1
     * @param int $id2
     * @return bool
     */
    public function connected(int $id1, int $id2): bool
    {
        return $this->find($id1) == $this->find($id2);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->count;
    }
}