<?php


namespace FunwithelePHPant\Algorithms;


use PHPUnit\Framework\TestCase;

class BsearchTest extends TestCase
{
    /**
     * @dataProvider provideBsearchSortedData
     * @param array $arr
     * @param int $needle
     * @param $expected
     */
    public function test_search_for_needle_in_sorted_array_returns_array_index(array $arr, int $needle, $expected)
    {
        $bsearch = new Bsearch();
        $result = $bsearch->search($arr, $needle);
        $this->assertEquals($expected, $result);
    }

    /**
     * @return array
     */
    public function provideBsearchSortedData() : array
    {
        return [
            [
                [1,2,3,4,5,6,7,8,9],
                8,
                7
            ],
            [
                [1,2,3,4,5,6,7,8,9],
                10,
                -1
            ],
            [
                [],
                8,
                -1
            ]

        ];
    }
}