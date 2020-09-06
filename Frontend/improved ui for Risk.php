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
  <title>Risk</title>
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
$appetite = 0;
$turn = 0;
$odds1 = 20;
$odds2 = 80;
$odds3 = 30;
$odds4 = 70;

?>

<html>
<div style="text-align: center; border: 5px solid; margin-left: 300px; margin-right: 300px;background-color:#b5cee6; border-radius: 10px;">
    <body onload="checkCookie()">
      <div style="display: inline">
        <p id='p0' style="margin-top: 50px; margin-right: 150px;font-weight: 700;color: black;font-size: 20px">Clicks: <span id='turn'></span></p>
        <p id='p1' style="margin-bottom: 100px; margin-top: -59px; margin-left: 150px;font-weight: 700;color: black;font-size: 20px">T-Dollars: <span id='t-dollars'></span></p>
      </div>  
      <div class="button-wrapper" style="text-align:center;display:inline-block; margin:10px;">
        <p id='p2' style="padding: 5px; background-color:#1979a9;color:black;margin-bottom: -10px"><span id='odds1'>20</span>% chance Increase by 2X</p>
        <p id='p3' style="padding: 5px; background-color:#1979a9;color:black;margin-bottom: -10px"><span id='odds2'>80</span>% chance Decrease to 0.5X</p>
        <button id="apt" onclick="myRisk(); calculate();" style="background-color:white;margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-bottom:5%; width: 50px">A</button>
      </div>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
      <button onclick="resetProgress()" style="background-color:white;margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-bottom:0%">Reset Progress</button>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
      <div class="button-wrapper" style="text-align:center;display:inline-block; margin:10px;">
        <p id='p4' style="padding: 5px; background-color:#1979a9;color:black;margin-bottom: -10px"><span id='odds3'>30</span>% chance Increase by 1.5X</p>
        <p id='p5' style="padding: 5px; background-color:#1979a9;color:black;margin-bottom: -10px"><span id='odds4'>70</span>% chance Decrease to 0.75X</p>
        <button id="opt" onclick="mySafe(); calculate();" style="background-color:white;margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-bottom:5%; width: 50px">B</button>
      </div>
     </body>

<script>

function resetProgress() {
        var amount = "<?php echo $amount ?>";
        var turn = "<?php echo $turn ?>";
        var odds1 = "<?php echo $odds1 ?>";
        var odds2 = "<?php echo $odds2 ?>";
        var odds3 = "<?php echo $odds3 ?>";
        var odds4 = "<?php echo $odds4 ?>";
        var appetite = "<?php echo $appetite ?>";
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', amount, 7);
        setCookie('odds1', odds1, 7);
        setCookie('odds2', odds2, 7);
        setCookie('odds3', odds3, 7);
        setCookie('odds4', odds4, 7);
        setCookie('appetite', appetite, 7);
        document.getElementById('turn').innerHTML = turn.toString();
        document.getElementById("t-dollars").innerHTML = amount.toString();
        document.getElementById("odds1").innerHTML = odds1.toString();
        document.getElementById("odds2").innerHTML = odds2.toString();
        document.getElementById("odds3").innerHTML = odds3.toString();
        document.getElementById("odds4").innerHTML = odds4.toString();
        document.getElementById("appetite").innerHTML = appetite.toString();

    }

    function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return "";
    }

    function checkCookie() {
        var amount = getCookie("amount");
        var turn = getCookie("turn");
        var odds1 = getCookie("odds1");
        var odds2 = getCookie("odds2");
        var odds3 = getCookie("odds3");
        var odds4 = getCookie("odds4");
        var appetite = "<?php echo $appetite ?>";

        if (amount == '' || turn == '' ||  odds1 == '' || odds2 == '' || odds3 == '' || odds4 == '' || appetite == '') {
            var amount = "<?php echo $amount ?>";
            var turn = "<?php echo $turn ?>";
            var odds1 = "<?php echo $odds1 ?>";
            var odds2 = "<?php echo $odds2 ?>";
            var odds3 = "<?php echo $odds3 ?>";
            var odds4 = "<?php echo $odds4 ?>";
            var appetite = "<?php echo $appetite ?>";
        }
        document.getElementById('turn').innerHTML = turn;
        document.getElementById('t-dollars').innerHTML = amount;
        document.getElementById('odds1').innerHTML = odds1;
        document.getElementById('odds2').innerHTML = odds2;
        document.getElementById('odds3').innerHTML = odds3;
        document.getElementById('odds4').innerHTML = odds4;
        document.getElementById("appetite").innerHTML = appetite.toString();
    }

    function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }

    // function chooseAsset() {
    //     var turn = parseInt(document.getElementById("turn").innerHTML);
    //     var turn = turn + 1;
    //     var amount = parseInt(document.getElementById("t-dollars").innerHTML);
    //     var amount = amount * 2;
        
    //     // var rand = Math.floor(Math.random() * 90) + 10;
    //     // document.getElementById("h1").innerHTML = "Turn: " + turn + " T-Dollars: " + (amount * 2);
    //     // document.getElementById("turn").innerHTML = (turn + 1)
    //     document.getElementById('turn').innerHTML = turn.toString();
    //     document.getElementById("t-dollars").innerHTML = amount.toString();
    //     setCookie('turn', turn.toString(), 7);
    //     setCookie('amount', (amount * 2), 7);

    // }

    function myRisk() {
        var turn = parseInt(document.getElementById("turn").innerHTML);
        var turn = turn + 1;
        var amount = parseInt(document.getElementById("t-dollars").innerHTML);
        var odds3 = parseInt(document.getElementById("odds1").innerHTML);
        var rand1 = Math.floor(Math.random() * 101);
        var rand2 = Math.floor(Math.random() * 81) + 10;

        if(rand1 > odds1){
          var amount = amount * 2;
        } else {
          var amount = amount * 0.5;
        }
        
        document.getElementById('turn').innerHTML = turn.toString();
        document.getElementById("t-dollars").innerHTML = amount.toString();
        document.getElementById("odds1").innerHTML = rand2.toString();
        document.getElementById("odds2").innerHTML = (100-rand2).toString();
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', amount, 7);
        setCookie('odds1', rand2, 7);
        setCookie('odds2', (100-rand2), 7);

    }

    function mySafe() {
        var turn = parseInt(document.getElementById("turn").innerHTML);
        var turn = turn + 1;
        var amount = parseInt(document.getElementById("t-dollars").innerHTML);
        var odds3 = parseInt(document.getElementById("odds3").innerHTML);
        var rand1 = Math.floor(Math.random() * 101);
        var rand2 = Math.floor(Math.random() * 81) + 10;

        if(rand1 > odds3){
          var amount = amount * 1.5;
        } else {
          var amount = amount * 0.75;
        }
        
        document.getElementById('turn').innerHTML = turn.toString();
        document.getElementById("t-dollars").innerHTML = amount.toString();
        document.getElementById("odds3").innerHTML = rand2.toString();
        document.getElementById("odds4").innerHTML = (100-rand2).toString();
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', amount, 7);
        setCookie('odds3', rand2, 7);
        setCookie('odds4', (100-rand2), 7);

    }
    
    function calculate() {
        var appetite = parseInt(document.getElementById("appetite").innerHTML);
        var odds1 = parseInt(document.getElementById("odds1").innerHTML);
        var appetite = appetite += odds1;

        document.getElementById('appetite').innerHTML = value.toString();
        setCookie('appetite', value, 7);
        
    }


// function mySafe() {

//   var rand1 = Math.floor(Math.random() * 101);
//   var rand2 = Math.floor(Math.random() * 81) + 10;

//   if(rand1 > given2){
//       document.getElementById("p0").innerHTML = "Clicks: " + count();
//       document.getElementById("p1").innerHTML = "T-Dollars: " + amount;
//       document.getElementById("p4").innerHTML = rand2 + "% chance Increase by 1.5X";
//       document.getElementById("p5").innerHTML = (100-rand2) + "% chance Decrease to 0.75X";
//       given2 = rand2;
// } else {
//       document.getElementById("p0").innerHTML = "Clicks: " + count();
//       document.getElementById("p1").innerHTML = "T-Dollars: " + amount();
//       document.getElementById("p4").innerHTML = rand2 + "% chance Increase by 1.5X";
//       document.getElementById("p5").innerHTML = (100-rand2) + "% chance Decrease to 0.75X";
//       given2 = rand2;

// }
// }
</script>
</body>
</div>
<br>
<div style="text-align: center;border: 5px solid;margin-left: 500px; margin-right: 500px ">
<p style="margin-top: 5%">Your risk appetite is: <span id='appetite'></span>%</p>
<p>Your risk tolerance is: <span id='tolerance'></span>%</p>
</div>
<html>


