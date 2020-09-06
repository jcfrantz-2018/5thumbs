<?php

class asset {
    //////// DECLARATION ////////
    private $name;
    private $value; 
    
    
    //////// CONSTRUCTOR ////////
    public function __construct($name, $value) {
        $this->name = $name;
        $this->value = $value;
    }
    
    //////// GETTER FUNCTION ////////
    public function getname(){
        return $this->name;
    }

    public function getvalue(){
        return $this->value;
    }

}

?>