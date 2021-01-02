<?php


namespace FunwithelePHPant\Algorithms;


class Bsearch
{
    public function search(array $arr, $needle, $sorted = true)
    {
        if ($sorted) return $this->searchSorted($arr, $needle, 0, count($arr)-1);
        return $this->searchNotSorted($arr, $needle, 0, count($arr)-1);
    }

    private function searchNotSorted(array $arr, $needle, int $low, int $high) : int
    {

    }

    private function searchSorted(array $arr, $needle, int $low, int $high) : int
    {
        if ($low > $high) return -1;
        $mid = ($low + $high) / 2;
        if ($arr[$mid] == $needle) return $mid;
        if ($needle < $arr[$mid]) {
            return $this->searchSorted($arr, $needle, $low, $mid - 1);
        } else {
            return $this->searchSorted($arr, $needle, $mid + 1, $high);
        }
    }
}