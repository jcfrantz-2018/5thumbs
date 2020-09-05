<?php

require_once '../Backend/common.php';
require_once 'header.php';

$username = $_SESSION['username'];

?>

<!DOCTYPE html>


<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eStartup Bootstrap Template</title>
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


<?php

$dao = new T_DollarsDAO();

$amount = $dao->getT_DollarsbyUsername($username);
$turn = 1;

?>

<html>
<div>
  <id="game" align=center style="text_align:center">
     <body>
        <p id='p1'>Turn:<?php echo $turn ?> &nbsp T-Dollars:<?php echo $amount ?></p>

        <button onclick="myRisk()" style="background-color:yellow;margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-bottom:0%">Risk</button>  
        <button onclick="mySafe()" style="background-color:yellow;margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-bottom:0%">Safe</button>

     </body>
<script>

function myRisk() {
  var total = 0;
  var amount = "<?php echo $amount ?>";
  var turn = "<?php echo $turn ?>";
  var rand = Math.floor(Math.random() * 90) + 10;

  if(rand > 50){
      document.getElementById("p1").innerHTML = "Turn: " + turn + " T-Dollars: " + (amount * 2);
} else {
      document.getElementById("p1").innerHTML = "Turn: " + turn + " T-Dollars: " + (amount * 0.5);
}
}

function mySafe() {
  var total = 0;
  var amount = "<?php echo $amount ?>";
  var turn = parseInt("<?php echo $turn ?>");
  var rand = Math.floor(Math.random() * 90) + 10;
  var turn = turn + 1;

  if(rand > 30){
      document.getElementById("p1").innerHTML = "Turn: " + turn + " T-Dollars: " + (amount * 1.5);
} else {
      document.getElementById("p1").innerHTML = "Turn: " + turn + " T-Dollars: " + (amount * 0.75);
}
}

</script>
</div>
<html>


