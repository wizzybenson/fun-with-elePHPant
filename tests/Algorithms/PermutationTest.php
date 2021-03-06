<?php


namespace FunwithelePHPant\Algorithms;


use PHPUnit\Framework\TestCase;

class PermutationTest extends TestCase
{
    /**
     * @param array $arr
     * @param array $permutations
     * @dataProvider permuteDataprovider
     */
    public function test_given_an_array_of_items_return_the_permutation(array $arr, array $permutations)
    {
        $perm = new Permutation();
        $permutations = array_flip(array_map('implode', $permutations));
        $result = $perm->nPermute($arr);
        $correct = true;
        foreach ($result as $value) {
            if (!isset($permutations[implode($value)])) {
                $correct = false;
                break;
            }
        }

        $this->assertTrue($correct && count($permutations) == count($result));
    }

    /**
     * @return array
     */
    public function permuteDataprovider() : array
    {
        return [
            [[1,2,3,4,5],[
                [1,2,3,4,5],
                [2,1,3,4,5],
                [3,1,2,4,5],
                [1,3,2,4,5],
                [2,3,1,4,5],
                [3,2,1,4,5],
                [3,2,4,1,5],
                [2,3,4,1,5],
                [4,3,2,1,5],
                [3,4,2,1,5],
                [2,4,3,1,5],
                [4,2,3,1,5],
                [4,1,3,2,5],
                [1,4,3,2,5],
                [3,4,1,2,5],
                [4,3,1,2,5],
                [1,3,4,2,5],
                [3,1,4,2,5],
                [2,1,4,3,5],
                [1,2,4,3,5],
                [4,2,1,3,5],
                [2,4,1,3,5],
                [1,4,2,3,5],
                [4,1,2,3,5],
                [5,1,2,3,4],
                [1,5,2,3,4],
                [2,5,1,3,4],
                [5,2,1,3,4],
                [1,2,5,3,4],
                [2,1,5,3,4],
                [2,1,3,5,4],
                [1,2,3,5,4],
                [3,2,1,5,4],
                [2,3,1,5,4],
                [1,3,2,5,4],
                [3,1,2,5,4],
                [3,5,2,1,4],
                [5,3,2,1,4],
                [2,3,5,1,4],
                [3,2,5,1,4],
                [5,2,3,1,4],
                [2,5,3,1,4],
                [1,5,3,2,4],
                [5,1,3,2,4],
                [3,1,5,2,4],
                [1,3,5,2,4],
                [5,3,1,2,4],
                [3,5,1,2,4],
                [4,5,1,2,3],
                [5,4,1,2,3],
                [1,4,5,2,3],
                [4,1,5,2,3],
                [5,1,4,2,3],
                [1,5,4,2,3],
                [1,5,2,4,3],
                [5,1,2,4,3],
                [2,1,5,4,3],
                [1,2,5,4,3],
                [5,2,1,4,3],
                [2,5,1,4,3],
                [2,4,1,5,3],
                [4,2,1,5,3],
                [1,2,4,5,3],
                [2,1,4,5,3],
                [4,1,2,5,3],
                [1,4,2,5,3],
                [5,4,2,1,3],
                [4,5,2,1,3],
                [2,5,4,1,3],
                [5,2,4,1,3],
                [4,2,5,1,3],
                [2,4,5,1,3],
                [3,4,5,1,2],
                [4,3,5,1,2],
                [5,3,4,1,2],
                [3,5,4,1,2],
                [4,5,3,1,2],
                [5,4,3,1,2],
                [5,4,1,3,2],
                [4,5,1,3,2],
                [1,5,4,3,2],
                [5,1,4,3,2],
                [4,1,5,3,2],
                [1,4,5,3,2],
                [1,3,5,4,2],
                [3,1,5,4,2],
                [5,1,3,4,2],
                [1,5,3,4,2],
                [3,5,1,4,2],
                [5,3,1,4,2],
                [4,3,1,5,2],
                [3,4,1,5,2],
                [1,4,3,5,2],
                [4,1,3,5,2],
                [3,1,4,5,2],
                [1,3,4,5,2],
                [2,3,4,5,1],
                [3,2,4,5,1],
                [4,2,3,5,1],
                [2,4,3,5,1],
                [3,4,2,5,1],
                [4,3,2,5,1],
                [4,3,5,2,1],
                [3,4,5,2,1],
                [5,4,3,2,1],
                [4,5,3,2,1],
                [3,5,4,2,1],
                [5,3,4,2,1],
                [5,2,4,3,1],
                [2,5,4,3,1],
                [4,5,2,3,1],
                [5,4,2,3,1],
                [2,4,5,3,1],
                [4,2,5,3,1],
                [3,2,5,4,1],
                [2,3,5,4,1],
                [5,3,2,4,1],
                [3,5,2,4,1],
                [2,5,3,4,1],
                [5,2,3,4,1]
              ]
            ]
        ];
    }
}