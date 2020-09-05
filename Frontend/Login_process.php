<?php
    require_once '../Backend/common.php';

    $dao = new UserDAO();
    $errors = [];

    $username = "";
    $password = "";

    if (!isset($_POST['password']) && !isset($_POST['username'])) {
        $errors[] = "Please fill in all particulars.";
        $_SESSION['errors'] = $errors;
        header('Location: Login.php');
        return;

    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        if (empty($username)) {
            $errors[] = 'Username cannot be empty';
        }
    
        if (empty($password)) {
            $errors[] = 'Password cannot be empty';
        }

    }

    if (count($errors)>0 ) {
        $_SESSION['errors'] = $errors;
        header('Location: Login.php');
        return;
    }

    else {
        // No Errors
        // main.php
        //$_SESSION['account'] = $username;
        header('Location: Home.php');
        return;
    }    
    
?>