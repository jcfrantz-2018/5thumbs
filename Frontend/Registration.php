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
  <title>Registration</title>
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

    <!-- <style>
        html * {
            font-family: Arial !important;
        }

        p {
            font-size: 20px;
        }

        table {
            border-collapse: collapse;
            border: solid 2px #ccc;
            font-size: 18px;
        }

        table td {
            padding: 10px;
        }

        .submit {
            height: 30px;
            width: 75px;
            font-size: 16px;
        }

        #submitrow {
            background-color: rgb(235, 235, 235);
        }
    </style>

</head> -->
<body>
<section id="hero" class="wow fadeIn">
    <div class="hero-container">
    <h1>Registration</h1>
    <h2>Create a new account!</h2>

    <div id='standard'>
    <form action='Registration_process.php' method='POST'>
        <table align=center>
            <tr>
                <td>First Name: </td>
                <td><input type='text' name='firstname'></td>
            </tr>
            <tr>
            <tr>
                <td>Last Name: </td>
                <td><input type='text' name='lastname'></td>
            </tr>
            <tr>
            <tr>
                <td>Username: </td>
                <td><input type='text' name='username'></td>
            </tr>
            <tr>
            <tr>
                <td>Email: </td>
                <td><input type='text' name='email'></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type='password' name='password'></td>
            </tr>
            <tr>
                <td colspan=2 align=center id=submitrow>
<<<<<<< Updated upstream
                <br>
                <a href="Start.php" class="btn-get-started scrollto" value='Login'>Register</a>
=======
                <input type='submit' class=submit value='Register'>
>>>>>>> Stashed changes
                </td>
            </tr>
        </table>
        <br>
        
    </form>
    </div>
  </section>
</body>
</html>

<?php
    printErrors();
?>