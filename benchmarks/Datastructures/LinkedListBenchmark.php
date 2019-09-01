<?php declare(strict_types = 1);

namespace FunwithelePHPant\Datastructures\LinkedList;

use FunwithelePHPant\Benchmark\Framework\Benchmark;

class LinkedListBenchmark extends Benchmark
{
    public function BenchmarkBagAddMethod()
    {
        $arrOfStringsBefore = ['to','be','or','not','to','be'];
        foreach ($arrOfStringsBefore as $item) {
            $this->bag->add(new StringNode($item));
        }
    }
}