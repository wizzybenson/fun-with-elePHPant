<?php


namespace FunwithelePHPant\Algorithms;


class Permutation
{
    public function nPermute(array $arr) : array
    {
        $result = [];
        $n = count($arr);
        $perm = [];
        $j = 0;
        $this->nPermuteWorker($arr, $n, $perm, $j, $result);
        return $result;

    }

    private function nPermuteWorker(array $arr, int $n, array $perm, int $j, array &$result) : void
    {
        if (count($perm) == $n) {
            $result[] = $perm;
            return;
        }
        for($i = 0; $i < count($arr); $i++) {
            $perm[$j] = $arr[$i];
            $this->nPermuteWorker(array_merge(array_slice($arr, 0, $i), array_slice($arr,$i + 1)),
                $n, $perm, $j + 1, $result
            );
        }
    }

}