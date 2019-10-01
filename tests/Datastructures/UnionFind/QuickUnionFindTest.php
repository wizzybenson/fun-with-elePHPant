<?php
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 01/10/19
 * Time: 07:25 م
 */

namespace FunwithelePHPant\Datastructures\UnionFind;

use PHPUnit\Framework\TestCase;

class QuickUnionFindTest extends TestCase
{
    public function test_find_method()
    {
        $sites = new QuickUnionFind(4);
        $site  = rand(0,3);
        $this->assertTrue($sites->find($site) === $site);
    }

    public function test_union_find()
    {
        $sites = new QuickUnionFind(4);
        $sites_to_union = [1,2,3];
        foreach ($sites_to_union as $site) {
            $sites->union(0,$site);
        }
        $this->assertTrue($sites->find(0) === 3);
    }
}