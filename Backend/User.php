<?php

class User {
    //////// DECLARATION ////////
    private $email;
    private $password;
    private $username;    
    private $first_name;
    private $last_name;
    
    //////// CONSTRUCTOR ////////
    public function __construct($email, $password, $username, $first_name, $last_name) {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }
    
    //////// GETTER FUNCTION ////////
    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getFirst_Name(){
        return $this->first_name;
    }
    
    public function getLast_Name(){
        return $this->last_name;
    }
}

?>