<?php 

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

session_start();

function printErrors() {
    if(isset($_SESSION['errors'])){
        print "<ul style='color:red;'>";
        
        foreach ($_SESSION['errors'] as $value) {
            print "<li>" . $value . "</li>";
        }
        
        print "</ul>";   
        unset($_SESSION['errors']);
    }    
}

function printSubmitErrors() {
    if(isset($_SESSION['submitErrors'])){
        print "<ul style='color:red;'>";
        
        foreach ($_SESSION['submitErrors'] as $value) {
            print "<li>" . $value . "</li>";
        }
        
        print "</ul>";   
        unset($_SESSION['submitErrors']);
    }    
}

function printBidErrors() {
    if(isset($_SESSION['bidErrors'])){
        print "<ul style='color:red;'>";
        
        foreach ($_SESSION['bidErrors'] as $value) {
            print "<li>" . $value . "</li>";
        }
        
        print "</ul>";   
        unset($_SESSION['bidErrors']);
    }    
}

function dropErrors() {
    if(isset($_SESSION['dropErrors'])){
        print "<ul style='color:red;'>";
        
        foreach ($_SESSION['dropErrors'] as $value) {
            print "<li>" . $value . "</li>";
        }
        
        print "</ul>";   
        unset($_SESSION['dropErrors']);
    }    
}


function isMissingOrEmpty($name) {
    if (!isset($_REQUEST[$name])) {
        return "missing $name";
    }

    // client did send the value over
    $value = $_REQUEST[$name];
    if (empty($value)) {
        return "blank $name";
    }
}

function dateFormat($date){
    $date = strval($date);
    $date = str_replace("-","",$date);

    return $date;
}


function timeFormat($time) {
    $time = strval($time);
    $time = str_replace(":","",$time);

    if ($time[0] == "0") {
        return substr($time,1,3);
    }

    return substr($time,0,4);
}

function dayFormat($number) {
    $number = intval($number);
    $DAY = [1=>"Monday", 2=>"Tuesday", 3=>"Wednesday", 4=>"Thursday", 5=>"Friday", 6=>"Saturday", 7=>"Sunday"];

    return ($DAY[$number]);
}


?>