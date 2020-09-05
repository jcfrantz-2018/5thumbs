<?php

class T_Dollars {
    //////// DECLARATION ////////
    private $email;
    private $T_Dollars;
    private $username;    
    
    
    //////// CONSTRUCTOR ////////
    public function __construct($email, $T_Dollars, $username) {
        $this->email = $email;
        $this->T_Dollars = $T_Dollars;
        $this->username = $username;
    }
    
    //////// GETTER FUNCTION ////////
    public function getEmail(){
        return $this->email;
    }

    public function getT_Dollars(){
        return $this->T_Dollars;
    }

    public function getUsername(){
        return $this->username;
    }

}

?>