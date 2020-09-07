<?php
    require_once '../Backend/common.php';
    
    $username = $_SESSION['username'];
    
    $dao = new UserDAO();
    $T_dollardao = new T_DollarsDAO();

    $errors = [];

    $username = "";
    $password = "";
    $email = "";
    $first_name = "";
    $last_name = "";

    if (!isset($_POST['email']) && !isset($_POST['password']) && !isset($_POST['username']) && !isset($_POST['firstname']) && !isset($_POST['lastname'])) {
        $errors[] = "Please fill in all particulars.";
        $_SESSION['errors'] = $errors;
        header('Location: Registration.php');
        return;

    } else {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];


        if (empty($username)) {
            $errors[] = 'Username cannot be empty';
        }
    
        if (empty($password)) {
            $errors[] = 'Password cannot be empty';
        }

        if (empty($email)) {
            $errors[] = 'Email cannot be empty';
        }

        if (empty($first_name)) {
            $errors[] = 'First Name cannot be empty';
        }

        if (empty($last_name)) {
            $errors[] = 'Last Name cannot be empty';
        }
    }

    if (count($errors)>0 ) {
        $_SESSION['errors'] = $errors;
        header('Location: Registration.php');
        return;
    }

    else {
        // No Errors
        // main.php
        //$_SESSION['account'] = $username;
        $dao->addUser($email, $password, $username, $first_name, $last_name);
        $T_dollardao->addUserT_Dollar($email, $username);
        header('Location: Login.php');
        return;
    }    
    
?>