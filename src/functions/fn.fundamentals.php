<?php declare(strict_types=1);

use FunwithelePHPant\Datastructures\LinkedList\{LinkedList, StringNode};
use FunwithelePHPant\Datastructures\Contracts\{IStack, IQueue, IBag};

/**
 * prints stack items
 *
 * Because the implementation class LinkedList already implements Iterator
 * foreach construct can be used to loop over stack items and print them.
 *
 * @param IStack $stack
 * @return void
 */
function fn_print_stack_content(IStack $stack): void
{
    foreach ($stack as $item) {
        echo "$item\n";
    }
}

/**
 * Check if parentheses are properly balanced.
 *
 * Write a stack client Parentheses that reads in a text stream from standard input (fgets(STDIN))
 * and uses a stack to determine whether its parentheses are properly balanced. For ex-
 * ample, your program should print true for [()]{}{[()()]()} and false for [(]) .
 * An Approach is the following:
 * read character from text,
 * check if opening parentheses : if true, push to stack.
 * check if closing parentheses and it's opening is top of stack: if true, pop from stack.
 * loop over text
 * at end of loop, if stack is empty ? return true else false
 *
 * @param IStack $stack
 * @param string $text
 * @return bool
 */
function fn_parentheses_balanced(IStack $stack, string $text): bool
{
    for ($i = 0; $i < strlen($text); $i++) {
        if (fn_opening_parentheses($text[$i])) {
            $stack->push(new StringNode($text[$i]));
        }

        if (fn_closing_parentheses($text[$i])) {
            if (!is_null($stack_top = $stack->peek())) {
                if (fn_match_parentheses($text[$i], $stack_top->item)) {
                    $stack->pop();
                }

            }
        }
    }

    return $stack->isEmpty();
}

/**
 * Check if character is opening parentheses.
 *
 * One of {[(
 *
 * @param string $char
 * @return bool
 */
function fn_opening_parentheses(string $char): bool
{
    $opening_parentheses = ['{', '[', '('];
    return in_array($char, $opening_parentheses);
}

/**
 * Check if character is closing parentheses.
 *
 * One of }])
 *
 * @param string $char
 * @return bool
 */
function fn_closing_parentheses(string $char): bool
{
    $closing_parentheses = ['}', ']', ')'];
    return in_array($char, $closing_parentheses);
}

/**
 * match parentheses.
 *
 * first parenthese1 is known to be closing parenthese
 *
 * @param string $parenthese1
 * @param string $parenthese2
 * @return bool
 */
function fn_match_parentheses(string $parenthese1, string $parenthese2): bool
{
    $matching_parentheses = [
        '}' => '{',
        ']' => '[',
        ')' => '('
    ];
    return $matching_parentheses[$parenthese1] === $parenthese2;
}

/**
 * Given a positive integer N, print it's binary representation.
 * should return 110010 when N is 50
 *
 * Divide N by 2 to get a quotient and a remainder
 * push remainder into stack.
 * repeat with quotient as new N
 * do while N not 0
 *
 * @param int $N
 * @param Istack $stack
 * @return void
 */
function fn_print_binary_representation(int $N, Istack $stack): void
{
    if ($N < 0) {
        throw new InvalidArgumentException("$N must be positive");
    }

    do {
        $quotient = floor($N / 2);
        $remainder = $N % 2;
        $N = $quotient;
        $stack->push(new StringNode((string)$remainder));
    } while ($N > 0);

    fn_print_stack_content($stack);
}

/**
 * Reverses a queue (Biblical reference : the first shall be the last).
 *
 * @param IQueue $queue
 * @param Callable $strategy
 * @return IQueue $reversed_queue
 */
function fn_reverse_queue(IQueue $queue, callable $strategy): IQueue
{
    return $strategy($queue);
}

/**
 * Reverses a queue using a stack
 *
 * @param IQueue $queue
 * @return IQueue $reversed_queue
 */
function fn_reverse_queue_using_stack(IQueue $queue): IQueue
{
    $stack = new LinkedList();
    while (!$queue->isEmpty()) {
        $stack->push($queue->dequeue());
    }

    while (!$stack->isEmpty()) {
        $queue->enqueue($stack->pop());
    }

    return $queue;
}