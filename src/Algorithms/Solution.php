<?php


namespace FunwithelePHPant\Algorithms;


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function largestDivisibleSubset($nums) {
        $subset = [];
        $result = [];
        $this->LDS($nums, 0, $subset, $result);
        return $result;
    }

    function LDS($nums, $i, $subset, &$result) {
        if ($i >= count($nums)) return;
        $subset[] = $nums[$i];
        $yes = true;
        for($j = 0; $j <= count($subset) - 2; $j++) {
            for($k = $j + 1; $k <= count($subset) - 1; $k++) {
                if (!(($subset[$j] % $subset[$k] == 0) || ($subset[$k] % $subset[$j] == 0))) {
                    $yes = false;
                    break;
                }
            }
            if (!$yes) break;
        }
        if ($yes && count($subset) > count($result)) {
            $result = $subset;
        }

        $this->LDS($nums, $i+1, $subset, $result);
        array_pop($subset);
        $this->LDS($nums, $i + 1, $subset, $result);
    }
}