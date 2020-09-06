<?php
    require_once 'common.php';

    if (!isset($_SESSION['username'])) {
        $_SESSION['errors'][] = "Unauthorised Access. Please login,";
        header('Location: ../Frontend/Login.php');
        return;
    }

?>