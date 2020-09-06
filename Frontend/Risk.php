<?php

require_once '../Backend/common.php';
require_once '../Backend/FinanceAPI.php';
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

?>

<html>
<div style="text-align: center; border: 5px solid; margin-left: 400px; margin-right: 400px;background-color:green">
    <body>
      <div style="display: inline">
        <p id='p0' style="margin-top: 50px; margin-right: 150px;font-weight: 700;color: black;font-size: 20px">Clicks: 0</p>
        <p id='p1' style="margin-bottom: 100px; margin-top: -59px; margin-left: 150px;font-weight: 700;color: black;font-size: 20px">T-Dollars: 100</p>
      </div>  
      <div class="button-wrapper" style="text-align:center;display:inline-block; margin:10px;">
        <p id='p2' style="padding: 5px; background-color:yellow;color:black;margin-bottom: -10px">20% chance Increase by 2X</p>
        <p id='p3' style="padding: 5px; background-color:yellow;color:black;margin-bottom: -10px">80% chance Decrease to 0.5X</p>
        <button id="apt" onclick="myRisk()" style="background-color:red;margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-bottom:5%; width: 50px">A</button>
      </div>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
      <div class="button-wrapper" style="text-align:center;display:inline-block; margin:10px;">
        <p id='p4' style="padding: 5px; background-color:yellow;color:black;margin-bottom: -10px">30% chance Increase by 1.5X</p>
        <p id='p5' style="padding: 5px; background-color:yellow;color:black;margin-bottom: -10px">70% chance Decrease to 0.75X</p>
        <button id="opt" onclick="mySafe()" style="background-color:red;margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-bottom:5%; width: 50px">B</button>
      </div>
     </body>

<script>

var given1 = 20;
var given2 = 30;
var total1 = 20;
var total2 = 30;
function amount(a, b){
   amount = a * b;
   a = amount
   return amount;
}

var count = (function () {
  var counter = 0;
  return function () {
    return counter +=1;
    }
})();

// function myRisk() {
//   var rand = Math.floor(Math.random() * 90) + 10;

//   if(rand > 50){
//     document.getElementById("p0").innerHTML = "Clicks: " + clicks;
//       document.getElementById("p1").innerHTML = "T-Dollars: " + (amount * 2)amount;
//       document.getElementById("p2").innerHTML = rand + "% chance Increase by 2X";
//       document.getElementById("p3").innerHTML = (100-rand) + "% chance Decrease to 0.5X";

// } else {
//   document.getElementById("p0").innerHTML = "Clicks: " + clicks;
//       document.getElementById("p1").innerHTML = "T-Dollars: " + (amount * 0.5)amount;
//       document.getElementById("p2").innerHTML = rand + "% chance Increase by 2X";
//       document.getElementById("p3").innerHTML = (100-rand) + "% chance Decrease to 0.5X";
// }
// }

function mySafe() {

  var rand1 = Math.floor(Math.random() * 101);
  var rand2 = Math.floor(Math.random() * 81) + 10;

  if(rand1 > given2){
      document.getElementById("p0").innerHTML = "Clicks: " + count();
      document.getElementById("p1").innerHTML = "T-Dollars: " + amount(100, 1.5);
      document.getElementById("p4").innerHTML = rand2 + "% chance Increase by 1.5X";
      document.getElementById("p5").innerHTML = (100-rand2) + "% chance Decrease to 0.75X";
      given2 = rand2;
} else {
      document.getElementById("p0").innerHTML = "Clicks: " + count();
      document.getElementById("p1").innerHTML = "T-Dollars: " + amount(100, 1.5);
      document.getElementById("p4").innerHTML = rand2 + "% chance Increase by 1.5X";
      document.getElementById("p5").innerHTML = (100-rand2) + "% chance Decrease to 0.75X";
      given2 = rand2;

}
}
</script>
</body>
</div>
<br>
<div style="text-align: center;border: 5px solid;margin-left: 500px; margin-right: 500px ">
<p style="margin-top: 5%">Your risk appetite is:</p>
<p>Your risk tolerance is:</p>
</div>
<html>


