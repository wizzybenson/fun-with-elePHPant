<?php


namespace FunwithelePHPant\Algorithms;


use PHPUnit\Framework\TestCase;

class CombinationTest extends TestCase
{
    /**
     * @param int $n
     * @param int $k
     * @param $nck
     *
     * @dataProvider nCkDataProviders
     */
    public function test_given_two_integers_n_to_choose_k(int $n, int $k, $nck)
    {
        $comb = new Combination();
        $result = $comb->nChooseK($n, $k);
        $this->assertEquals($nck, $result);
    }

    /**
     * @param array $arr
     * @param int $r
     * @param $res
     *
     * @dataProvider nCrDataProviders
     */
    public function test_given_array_of_size_n_of_items_choose_r_fix_recurr(array $arr, int $r, array $res)
    {
        $comb = new Combination();
        $result = $comb->nChooseRFixRecurr($arr, $r);
        $res = array_flip(array_map('implode',$res));
        $exists = true;
        foreach ($result as $value) {
            if (empty($value)) continue;
            if (!isset($res[implode($value)])) {
                $exists = false;
                break;
            }
        }
        $this->assertTrue($exists && count($res) == count($result));
    }

    /**
     * @param array $arr
     * @param int $r
     * @param $res
     *
     * @dataProvider nCrDataProviders
     */
    public function test_given_array_of_size_n_of_items_choose_r_include_exclude(array $arr, int $r, array $res)
    {
        $comb = new Combination();
        $result = $comb->nChooseRIncludeExclude($arr, $r);
        $res = array_flip(array_map('implode',$res));
        $exists = true;
        foreach ($result as $value) {
            if (empty($value)) continue;
            if (!isset($res[implode($value)])) {
                $exists = false;
                break;
            }
        }
        $this->assertTrue($exists);
    }

    /**
     * @return array
     */
    public function nCkDataProviders() : array
    {
        return [
            [6,0,1],
            [6,1,6],
            [6,2,15],
            [6,3,20],
            [6,4,15],
            [6,5,6],
            [6,6,1],
        ];
    }

    /**
     * @return array
     */
    public function nCrDataProviders() : array
    {
        return [
            [[1, 2, 3, 4], 2, [[1, 2], [1, 3], [1, 4], [2, 3], [2, 4], [3, 4]]],
            [[1, 2, 3, 4, 5], 3, [[1, 2, 3], [1, 2, 4], [1, 2, 5], [1, 3, 4], [1, 3, 5], [1, 4, 5], [2, 3, 4], [2, 3, 5], [2, 4, 5], [3, 4, 5]]]
            ];
    }
}