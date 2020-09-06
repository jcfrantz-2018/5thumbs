<?php

require_once '../Backend/common.php';

?>

<?php

// $T_dollars = new T_DollarsDAO;
// $Leaderboard = $T_dollars->getUsername_T_Dollars();


// $userObj = new UserDAO;
// $Fullname = $userObj->getFullName('alice');

// echo $Fullname;
// echo '<br>';
// print_r($Leaderboard);

?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eStartup
    Theme URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>
<body>
<section id="hero" class="wow fadeIn">
    <div class="hero-container">
    <h1 align=center>Login</h1><br>
    <form action='Login_process.php' method='POST'>
        <table align=center>
            <tr>
                <td>Username: </td>
                <td><input type='text' name='username'></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type='password' name='password'></td>
            </tr>
            <tr>
                <td colspan=2 align=center id=submitrow>
                <br>
                <button type="submit" value="Login">Login</button>
                </td>
            </tr>
        </table>
        <br>
    </form></div>
</body>
</html>

<?php
    printErrors();
?>