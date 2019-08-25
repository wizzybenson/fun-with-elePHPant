<?php

namespace FunwithelePHPant\Benchmark\Framework;

class Benchmarking
{
    public static function load(string $benchmarks_directory = "/var/www/html/funwithelePHPant/benchmarks")
    {
        if ($handle = opendir(realpath($benchmarks_directory))) {
            while (false !== ($entry = readdir($handle))) {
                echo "$entry\n";
            }

            closedir($handle);
        }

    }

    public static function run()
    {

    }

}