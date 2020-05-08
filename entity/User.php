<?php

namespace App\Entity;

require("./vendor/autoload.php");

class User
{
    private $firstName;
    private $lastName;
    private $email;
    private $age;
    private $todoList;

    public function __construct($f, $l, $e, $a)
    {
        $this->firstName = $f;
        $this->lastName = $l;
        $this->email = $e;
        $this->age = $a;
        $this->todoList = null;
    }

    public function addTodoList(TodoList $todolist)
    {
        if($this->todoList == null)
            $this->todoList = $todolist->getName();
        else
            return false;
    }

    public function isFirstNameValid(){
        return is_string($this->firstName) &&  strlen($this->firstName) >= 6;
    }
    public function isLastNameValid(){
        return is_string($this->firstName) &&  strlen($this->lastName) >= 9;
    }
    public function isEmailValid(){
        return is_integer(strpos($this->email, '@'));
    }
    public function isAgeValid(){
        return $this->age > 13 && is_integer($this->age);
    }
    public function isValid(){
        return $this->isFirstNameValid() &&
        $this->isLastNameValid() &&
        $this->isEmailValid() &&
        $this->isAgeValid();
    }


    public function setTodoList($todoList)
    {
        if($this->todoList == null){
            $this->todoList = $todoList;
        }
    }

    /**
     * Get the value of todoList
     */ 
    public function getTodoList()
    {
        return $this->todoList;
    }
}
