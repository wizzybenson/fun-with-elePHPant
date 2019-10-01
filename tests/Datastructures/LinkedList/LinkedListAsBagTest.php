<?php declare(strict_types = 1);

namespace FunwithelePHPant\Datastructures\LinkedList;

use PHPUnit\Framework\TestCase;

class LinkedListAsBagTest extends TestCase 
{
	protected $bag;

	/*public function setUp() : void
	{
		$this->bag = new LinkedList();
	}*/

	public function test_Can_New_Up_LinkedList()
	{
        $bag = new LinkedList();
		$this->assertTrue($bag instanceof LinkedList,'Hooray, we have a bag');
	}

	public function test_Can_Make_A_Bag_Of_Strings()
	{
	    $bag = new LinkedList();
		$arrOfStringsBefore = ['to','be','or','not','to','be'];
		foreach ($arrOfStringsBefore as $item) {
			$bag->add(new StringNode($item));
		}

		$arrOfStringsAfter = [];

		foreach ($bag as $key => $item) {
			array_unshift($arrOfStringsAfter,$item);
		}

		$this->assertTrue($arrOfStringsBefore === $arrOfStringsAfter, 'Bag can store StringNodes');
	}

    public function test_Can_Delete_Last_Node_From_Linkedlist()
    {
        $bag = new LinkedList();
        $arrOfStringsBefore = ['to'];
       // $last_after = 'be';
        foreach ($arrOfStringsBefore as $item) {
            $bag->add(new StringNode($item));
        }

        $size_before =  $bag->size();
        $fn_delete_last_node_from_linkedlist= function() {
            if (!$this->first || !$this->first->next) {
                $this->last = null;
                $this->first = null;
                $this->size = 0;

                return;
            }

            for ($x = $this->first; $x !== null; $x = $x->next) {
                if (!$x->next->next) {
                    $this->last = $x;
                    $this->shrink();
                    $x->next = null;
                    break;
                }
            }

        };

        $fn_delete_last_node_from_linkedlist->call($bag);

        $size_after = $bag->size();



        $this->assertTrue($size_after === $size_before-1);
    }

}