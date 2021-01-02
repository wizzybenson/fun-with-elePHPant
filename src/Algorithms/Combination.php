<?php


namespace FunwithelePHPant\Algorithms;


class Combination
{
    public function nChooseK(int $n, int $k)
    {
        if ($n == $k || $k == 0) return 1;
        return $this->nChooseK($n - 1, $k - 1) + $this->nChooseK($n - 1, $k);
    }

    public function nChooseRFixRecurr(array $arr, int $r) : array
    {
        $res = [];
        $n = count($arr);
        $start = 0;
        $comb = [];
        $index = 0;
        $this->nChooseRFixRecurrWorker($arr, $n, $start, $comb, $index, $r,$res);
        return $res;

    }

    private function nChooseRFixRecurrWorker(array $arr, int $n, int $start, array $comb, int $index, int $r, array &$res) : void
    {
        if (count($comb) == $r) {
            $res[] = $comb;
            return;
        }
        for($i = $start; $i < $n; $i++) {
            $comb[$index] = $arr[$i];
            $this->nChooseRFixRecurrWorker($arr, $n, $i + 1, $comb, $index + 1, $r, $res);
        }
    }

    public function nChooseRIncludeExclude(array $arr, int $r) : array
    {
        $res = [];
        $n = count($arr);
        $i = 0;
        $comb = [];
        $index = 0;
        $this->nChooseRIncludeExcludeWorker($arr, $n, $i, $comb, $index, $r, $res);
        return $res;
    }

    private function nChooseRIncludeExcludeWorker(array $arr, int $n, int $i, array $comb, int $index, int $r, array &$res) : void
    {
        if ($i >= $n) return;
        if (count($comb) == $r) {
            $res[] = $comb;
            return;
        }
        $comb[$index] = $arr[$i];
        $this->nChooseRIncludeExcludeWorker($arr, $n, $i + 1, $comb, $index + 1, $r, $res);
        $this->nChooseRIncludeExcludeWorker($arr, $n, $i + 1, $comb, $index, $r, $res);
    }
}