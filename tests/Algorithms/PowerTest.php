<?php


namespace FunwithelePHPant\Algorithms;


use PHPUnit\Framework\TestCase;

class PowerTest extends TestCase
{
    /**
     * @dataProvider providePowerData
     */
    public function test_integer_base_raised_to_integer_power_using_version_1(int $base, int $exp, int $expected)
    {
        $power = new Power();
        $result = $power->raise($base, $exp, 'v1');
        $this->assertEquals($expected, $result, "$base to the power $exp is $result");
    }

    /**
     * @dataProvider providePowerData
     */
    public function test_integer_base_raised_to_integer_power_using_version_2(int $base, int $exp, int $expected)
    {
        $power = new Power();
        $result = $power->raise($base, $exp, 'v2');
        $this->assertEquals($expected, $result, "$base to the power $exp is $result");
    }

    public function test_raise_throws_BadMethodCallException()
    {
        $power = new Power();
        $this->expectException(\BadMethodCallException::class);
        $power->raise(2, 5, 'doesnotexist');
    }

    public function test_raise_v1_throws_InvalidArgurementException()
    {
        $power = new Power();
        $this->expectException(\InvalidArgumentException::class);
        $power->raise(0, 5, 'v1');
    }

    public function test_raise_v2_throws_InvalidArgurementException()
    {
        $power = new Power();
        $this->expectException(\InvalidArgumentException::class);
        $power->raise(2, -1, 'v2');
    }

    /**
     * @return array[][]
     */
    public function providePowerData(): array
    {
        return [
            [1, 5, pow(1, 5)],
          [2, 5, pow(2, 5)],
          [3, 5, pow(3, 5)],
          [4, 5, pow(4, 5)],
          [5, 5, pow(5, 5)]
        ];
    }
}