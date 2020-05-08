<?php

namespace App\Entity;

use DateTime;
use Exception;

require("./vendor/autoload.php");

class TodoList
{
    
    private $name;
    private $items = [];
    private $owner;
    private $createdAt;
    private $lastUpdate;

    public function __construct($n = null, $o = null)
    {
        $this->name = $n;
        $this->items = [];
        $this->owner = $o;
        $this->createdAt = new DateTime();
        $this->lastUpdate = null;
    }

    public function setOwner(User $user)
    {
        if($user->getTodoList() == null)
            $this->owner = $user;
        else{
            throw new Exception('This user already have a todolist.');
        }
    }
    
    public function setName($name)
    {
        if(strlen($name) > 0 && strlen($name) <= 10)
            $this->name = $name;
        else
            throw new Exception('Name size should be between 0 and 50 characters');
    }

    public function addItem($value)
    {
        if(count($this->items) < 10){
            array_push($this->items, $value);
            $this->setLastUpdate(new DateTime());
            return $this;
        }else{
            throw new Exception('Name size should be between 0 and 50 characters');
        }
    }

    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }

    /**
     * Get the value of owner
     */ 
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Get the value of items
     */ 
    public function getItems()
    {
        return $this->items;
    }
}
