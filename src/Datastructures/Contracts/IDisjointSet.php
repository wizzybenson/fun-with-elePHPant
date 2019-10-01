<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 07/09/19
 * Time: 12:07 ص
 */

namespace FunwithelePHPant\Datastructures\Contracts;


/**
 * Interface IDisjointSet
 * @package FunwithelePHPant\Datastructures\Contracts
 */
interface IDisjointSet
{
    /**
     * @param int $item1
     * @param int $item2
     */
    public function union(int $item1, int $item2): void;

    /**
     * @param int $item
     * @return int
     */
    public function find(int $item): int;

    /**
     * @param int $item1
     * @param int $item2
     * @return bool
     */
    public function connected(int $item1, int $item2): bool;

    /**
     * @return int
     */
    public function count(): int;
}