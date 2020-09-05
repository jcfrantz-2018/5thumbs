<?php
require_once '../Backend/common.php';
unset($_SESSION);
session_destroy();
header("Location: Login.php");
?>