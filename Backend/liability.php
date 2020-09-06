<?php

class liability {
    //////// DECLARATION ////////
    private $name;
    private $value;
    private $happiness;
    
    
    //////// CONSTRUCTOR ////////
    public function __construct($name, $value, $happiness) {
        $this->name = $name;
        $this->value = $value;
        $this->happiness = $happiness;
    }
    
    //////// GETTER FUNCTION ////////
    public function getname(){
        return $this->name;
    }

    public function getvalue(){
        return $this->value;
    }

    public function gethappiness(){
        return $this->happiness;
    }
}

?>