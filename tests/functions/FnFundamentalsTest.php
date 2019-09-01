<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use FunwithelePHPant\Datastructures\LinkedList\{LinkedList, StringNode};

class FnFundamentalsTest extends TestCase
{
    public function test_fn_print_stack_content()
    {
        $stack = new LinkedList();
        $arrOfStrings = ['1', '2', '3', '4', '5', '6'];
        foreach ($arrOfStrings as $item) {
            $stack->push(new StringNode($item));
        }

        ob_start();
        fn_print_stack_content($stack);
        $stack_elements = ob_get_clean();

        $this->assertTrue(str_split(str_replace("\n", "", strrev($stack_elements))) === $arrOfStrings, 'stack content can be printed');
    }

    public function test_fn_print_binary_representation()
    {
        $stack = new LinkedList();

        ob_start();
        fn_print_binary_representation(50, $stack);
        $binary_representation = ob_get_clean();
        $this->assertTrue(str_replace("\n", "", $binary_representation) === (string)decbin(50), 'Binary representation of 50 printed');
    }

    public function no_test_fn_print_binary_representation_throws_InvalidArgumentException()
    {
        fn_print_binary_representation(-50, new LinkedList());
        $this->expectException(InvalidArgumentException::class, '-50 given : expects a positive integer');
    }

    public function test_fn_reverse_queue_using_stack()
    {
        $queue = new LinkedList();
        $arrOfStringsBefore = ['1', '2', '3', '4', '5', '6'];
        foreach ($arrOfStringsBefore as $item) {
            $queue->enqueue(new StringNode($item));
        }

        $reversed_queue = fn_reverse_queue($queue, 'fn_reverse_queue_using_stack');

        $arrOfStringsAfter = [];
        foreach ($reversed_queue as $key => $item) {
            array_push($arrOfStringsAfter, $item);
        }

        $this->assertTrue(array_reverse($arrOfStringsBefore) === $arrOfStringsAfter, 'Queue can be reversed using a stack');
    }

    public function test_fn_insert_left_parentheses_to_infix_expression()
    {
        $operator_stack = new LinkedList();
        $expression_stack = new LinkedList();
        $operator_array = ['+', '*', '-'];
        $input_expression = '1+2)*3-4)*5-6)))';
        $output_expression = '((1+2)*((3-4)*(5-6)))';
        $this->assertTrue(fn_insert_left_parentheses_to_infix_expression($expression_stack, $operator_stack, $input_expression, $operator_array) === $output_expression, 'Balanced infix expression');
    }

    public function test_fn_infix_to_postfix()
    {
        $output_queue = new LinkedList();
        $operator_stack = new LinkedList();
        $infix_expression = '3+4*2/(1-5)^2^3';
        $postfix_expression = '342*15-23^^/+';
        $this->assertTrue(fn_infix_to_postfix($output_queue, $operator_stack, $infix_expression, fn_get_operators()) === $postfix_expression);
    }

    function test_fn_evaluate_postfix() {
        $evaluation_stack = new LinkedList();
        //$infix_expression = '(5*4+3*2)-1'; '((1+2)*((3-4)*(5-6)))'
        $postfix_expression = '54*32*+1-';
        $value = 25;
        $this->assertTrue(fn_evaluate_postfix($evaluation_stack, $postfix_expression, fn_get_operators()) === (float)$value);
    }


}