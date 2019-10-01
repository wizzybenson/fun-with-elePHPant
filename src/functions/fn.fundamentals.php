<?php /** @noinspection ALL */
declare(strict_types=1);

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

/**
 * @param IStack $expression_stack
 * @param IStack $operator_stack
 * @param string $input_expression
 * @param array $operator_array
 * @return null|string
 */
function fn_insert_left_parentheses_to_infix_expression(IStack $expression_stack, IStack $operator_stack, string $input_expression, array $operator_array): ?string
{
    for ($i = 0; $i < strlen($input_expression); $i++) {
        if (in_array($input_expression[$i], $operator_array)) {
            $operator_stack->push(new StringNode($input_expression[$i]));
        } else if ($input_expression[$i] === ')') {
            $operator = $operator_stack->pop();
            $second_operand = $expression_stack->pop();
            $first_operand = $expression_stack->pop();
            $infix_expresssion = fn_make_infix([$first_operand, $operator, $second_operand]);
            $parenthesized_infix = fn_parenthesize($infix_expresssion);
            $expression_stack->push(new StringNode($parenthesized_infix));
        } else {
            $expression_stack->push(new StringNode($input_expression[$i]));
        }
    }
    if (!$expression_stack->isEmpty()) {
        return ($expression_stack->pop())->item;
    }
    return null;
}

/**
 * @param array $expression
 * @return string
 */
function fn_make_infix(array $expression): string
{
    return join('', $expression);
}

/**
 * @param string $expression
 * @return string
 */
function fn_parenthesize(string $expression): string
{
    return sprintf('(%s)', $expression);
}

/**
 * @param IQueue $output_queue
 * @param IStack $operator_stack
 * @param string $infix_expression
 * @param array $operators
 * @return string
 */
function fn_infix_to_postfix(IQueue $output_queue, IStack $operator_stack, string $infix_expression, array $operators): string
{
    $postfix_expression = '';
    for ($i = 0; $i < strlen($infix_expression); $i++) {
        if (is_numeric($infix_expression[$i])) {
            $output_queue->enqueue(new  StringNode($infix_expression[$i]));
        }

        if ($infix_expression[$i] == '(') {
            $operator_stack->push(new  StringNode($infix_expression[$i]));
        }

        if ($infix_expression[$i] == ')') {
            while (($operator_stack->peek())->item !== '(') {
                $output_queue->enqueue($operator_stack->pop());
            }
            $operator_stack->pop();
        }

        if (fn_is_operator($infix_expression[$i], $operators)) {
            while (($top = $operator_stack->peek()) && fn_is_operator($top->item, $operators)) {
                $associativity = fn_get_operator_associativity($top->item, $operators);
                $precedence = fn_check_operator_precedence($top->item, $infix_expression[$i], $operators);
                if (($precedence == 0 && $associativity == 'left') || $precedence > 0) {
                    $output_queue->enqueue($operator_stack->pop());
                } else {
                    break;
                }
            }
            $operator_stack->push(new StringNode($infix_expression[$i]));
        }
    }
    while (!$operator_stack->isEmpty()) {
        $output_queue->enqueue($operator_stack->pop());
    }

    while (!$output_queue->isEmpty()) {
        $postfix_expression .= $output_queue->dequeue()->item;
    }

    return $postfix_expression;
}

/**
 * @param IStack $evaluation_stack
 * @param string $postfix_expression
 * @param array $operators
 * @return float
 */
function fn_evaluate_postfix(IStack $evaluation_stack, string $postfix_expression, array $operators): float
{
    for ($i = 0; $i < strlen($postfix_expression); $i++) {
        if (is_numeric($postfix_expression[$i])) {
            $evaluation_stack->push(new StringNode($postfix_expression[$i]));
        }

        if (fn_is_operator($postfix_expression[$i], $operators)) {
            $second = ($evaluation_stack->pop())->item;
            $first = ($evaluation_stack->pop())->item;
            $infix = fn_make_infix([$first, $postfix_expression[$i], $second]);
            //avoid eval haha
            $value = eval("return $infix ;");
            $evaluation_stack->push(new  StringNode((string)$value));
        }
    }

    return (float)($evaluation_stack->pop())->item;
}

/**
 * @return array
 */
function fn_get_operators(): array
{
    return [
        '^' => [
            'operator' => '^',
            'precedence' => '4',
            'associativity' => 'right'
        ],
        '*' => [
            'operator' => '*',
            'precedence' => '3',
            'associativity' => 'left'
        ],
        '/' => [
            'operator' => '/',
            'precedence' => '3',
            'associativity' => 'left'
        ],
        '+' => [
            'operator' => '+',
            'precedence' => '2',
            'associativity' => 'left'
        ],
        '-' => [
            'operator' => '-',
            'precedence' => '2',
            'associativity' => 'left'
        ],

    ];
}

/**
 * @param string $operator
 * @param array $operators
 * @return null|string
 */
function fn_get_operator_associativity(string $operator, array $operators): ?string
{
    return isset($operators[$operator]) ? $operators[$operator]['associativity'] : null;
}

/**
 * @param string $operator1
 * @param string $operator2
 * @param array $operators
 * @return int|null
 */
function fn_check_operator_precedence(string $operator1, string $operator2, array $operators): ?int
{
    return isset($operators[$operator1], $operators[$operator2]) ? $operators[$operator1]['precedence'] <=> $operators[$operator2]['precedence'] : null;
}

/**
 * @param string $expression
 * @param array $operators
 * @return bool
 */
function fn_is_operator(string $expression, array $operators): bool
{
    return isset($operators[$expression]);
}