<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\TodoList;
use App\Entity\User;

use Exception;

require("./vendor/autoload.php");

class TodoListTest extends TestCase
{
    /**
     * @dataProvider setOwnerProvider
     */
    public function testSetOwner($value, $expected)
    {
        $this->assertInstanceOf($expected, $value);
    }
    /**
     * @dataProvider setNameProvider
     */
    public function testSetName($value, $expected)
    {
        $this->assertInstanceOf($expected, $value);
    }
    /**
     * @dataProvider addItemProvider
     */
    public function testadditem($value, $expected)
    {
        $todoList = new TodoList();
        $this->assertLessThanOrEqual(10, count($todoList->getItems()));

    }
   
   
    public function setOwnerProvider()
    {
        $owner = new User("Fanilo", "RAVELOSON", "raveloson.fanilo@gmail.com", "25");
        $todoList = new TodoList("Homeworks", $owner);

        $ownerTwo = $owner;
        $ownerTwo->setTodoList($todoList);
        $todoListTwo = new TodoList("Homeworks");
        
        return [
            'if owner already have a todolist expect an instance of Owner'  => [$todoList->getOwner(), User::class],
            'if owner does not have a todolist expect an instance of Exception' => [$todoListTwo->setOwner($ownerTwo), Exception::class]
        ];
    }
    public function setNameProvider()
    {
        
        $todoList = new TodoList();
        
        return [
            'if list name length > 20 expect an instance of Exception'  => [$todoList->setName("efhstrhtrsht hst hstrsrt h"), Exception::class],
            'if todlis name is set expect an instance of todolist' => [$todoList->setName("esdht "), TodoList::class]
        ];
    }
    public function addItemProvider()
    {
        $todoList = new TodoList();
        $todoListTwo = new TodoList();
        for($i = 0; $i <10 ; $i++){
            $todoListTwo->addItem("test");
        }

        return [
            'if todolist length > 10 expect an instance of Exception'  => [$todoList->addItem("test"), Exception::class],
            'if todlist length < 10 expect an instance of todolist' => [$todoListTwo ->addItem("test"), TodoList::class]
        ];
    }

}