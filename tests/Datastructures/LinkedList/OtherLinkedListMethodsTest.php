<?php
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 05/09/19
 * Time: 08:11 م
 */

namespace FunwithelePHPant\Datastructures\LinkedList;

use PHPUnit\Framework\TestCase;

class OtherLinkedListMethodsTest extends TestCase
{
    function test_Can_Delete_5th_Element_in_LinkedList()
    {
        $bag = new OtherLinkedListMethods();
        $k = 5;
        $arrOfStringsBefore = ['to','be','or','not','care','anymore'];
        foreach ($arrOfStringsBefore as $item) {
            $bag->add(new StringNode($item));
        }

        $arrOfStringsAfter = [];
        $bag->delete($k);
        foreach ($bag as $key => $item) {
            array_unshift($arrOfStringsAfter,$item);
        }
        unset($arrOfStringsBefore[count($arrOfStringsBefore) - $k]);
        $arrOfStringsBeforeMinus5thElement = array_values($arrOfStringsBefore);

        $this->assertTrue($arrOfStringsAfter === $arrOfStringsBeforeMinus5thElement);
    }

    function test_Can_Find_Node_In_LinkedList_By_string_Key()
    {
        $bag = new OtherLinkedListMethods();
        $arrOfStrings= ['to','be','or','not','care','anymore'];
        $key = 'care';
        foreach ($arrOfStrings as $item) {
            $bag->add(new StringNode($item));
        }
        $found_node = $bag->find($bag, $key);

        $this->assertTrue($found_node);

    }

    function test_Can_Remove_Node_In_LinkedList_Following_Given_Node()
    {
        $bag = new OtherLinkedListMethods();
        $arrOfStrings = ['to','be','or','not','care','anymore'];
        foreach ($arrOfStrings as $item) {
            $bag->add(new StringNode($item));
        }

        $bag->removeAfter($bag->peek());

        $this->assertTrue(($bag->peek())->next->item === 'not');

    }

    function test_Can_Insert_Second_LinkedList_Node_After_First()
    {
        $bag = new OtherLinkedListMethods();
        $arrOfStrings = ['to','be','or','not','care','anymore'];
        foreach ($arrOfStrings as $item) {
            $bag->add(new StringNode($item));
        }

        $second = new StringNode('insert');
        $bag->insertAfter($bag->peek(), $second);

        $this->assertTrue(($bag->peek())->next->item === 'insert');

    }

    function test_Can_Remove_All_Nodes_with_Item_As_given_key()
    {
        $bag = new OtherLinkedListMethods();
        $arrOfStrings = ['to','be','or','not','to','be'];
        $key = 'to';
        foreach ($arrOfStrings as $item) {
            $bag->add(new StringNode($item));
        }

        $bag->remove($bag, $key);
        $removed_all = true;
        foreach ($bag as $item) {
           if ($item === $key) {
               $removed_all = false;
               break;
           }
        }

        $this->assertTrue($removed_all);
    }

    function test_Can_Return_Max_Item_In_Linkedlist()
    {
        $bag = new OtherLinkedListMethods();
        $arrOfInts = [1, 2, 3, 4, 5, 6];
        foreach ($arrOfInts as $item) {
            $bag->add(new IntegerNode($item));
        }

        $maximum_item = $bag->max($bag->peek());
        $this->assertEquals(6, $maximum_item);
    }

    function test_Can_Return_Max_Item_In_Linkedlist_Using_maxRecursive()
    {
        $bag = new OtherLinkedListMethods();
        $arrOfInts = [1, 2, 3, 4, 5, 6];
        foreach ($arrOfInts as $item) {
            $bag->add(new IntegerNode($item));
        }

        $maximum_item = $bag->maxRecursive($bag->peek(),0);
        $this->assertEquals(6, $maximum_item);
    }

    function test_Can_Reverse_Linkedlist()
    {
        $bag = new OtherLinkedListMethods();
        $arr_of_ints = [1, 2, 3, 4, 5, 6];
        foreach ($arr_of_ints as $item) {
            $bag->add(new IntegerNode($item));
        }

        $reversed_list_items = [];
        $reversed = $bag->reverse($bag->peek());
        while ($reversed) {
            array_push($reversed_list_items, $reversed->item);
            $reversed = $reversed->next;
        }

        $this->assertTrue($arr_of_ints === $reversed_list_items);
    }

    function test_Can_Reverse_Linkedlist_Using_reverseRecursive()
    {
        $bag = new OtherLinkedListMethods();
        $arr_of_ints = [1, 2, 3, 4, 5, 6];
        foreach ($arr_of_ints as $item) {
            $bag->add(new IntegerNode($item));
        }

        $reversed_list_items = [];
        $reversed = $bag->reverseRecursive($bag->peek());
        while ($reversed) {
            array_push($reversed_list_items, $reversed->item);
            $reversed = $reversed->next;
        }

        $this->assertTrue($arr_of_ints === $reversed_list_items);
    }
}