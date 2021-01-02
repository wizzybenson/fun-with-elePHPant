<?php


namespace FunwithelePHPant\Algorithms;


class Subset
{
    public function allSubset(array $arr) : array
    {
        $result = [];
        $subset = [];
        $i = 0;
        $this->allSubsetsWorker($arr, $i, $subset, $result);
        return $result;
    }

    private function allSubsetsWorker(array $arr, $i, array $subset, array &$result)
    {
        if ($i >= (count($arr))) return;
        $subset[] = $arr[$i];
        $result[] = $subset;
        $this->allSubsetsWorker($arr, $i + 1, $subset, $result);
        array_pop($subset);
        $this->allSubsetsWorker($arr, $i + 1, $subset, $result);
    }
}