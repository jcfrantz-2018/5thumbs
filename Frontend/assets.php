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
$turn = 11;
?>

<script>

    function resetProgress() {
        var amount = "<?php echo $amount ?>";
        var turn = "<?php echo $turn ?>";
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', (amount * 2), 7);
        document.getElementById('turn').innerHTML = turn.toString();
        document.getElementById("t-dollars").innerHTML = amount.toString();
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

        if (amount == '' || turn == '') {
            var amount = "<?php echo $amount ?>";
            var turn = "<?php echo $turn ?>";
        }
        document.getElementById('turn').innerHTML = turn;
        document.getElementById('t-dollars').innerHTML = amount;
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

    function chooseAsset() {
        var turn = parseInt(document.getElementById("turn").innerHTML);
        var turn = turn + 1;
        var amount = parseInt(document.getElementById("t-dollars").innerHTML);
        var amount = amount * 2;
        
        // var rand = Math.floor(Math.random() * 90) + 10;
        // document.getElementById("h1").innerHTML = "Turn: " + turn + " T-Dollars: " + (amount * 2);
        // document.getElementById("turn").innerHTML = (turn + 1)
        document.getElementById('turn').innerHTML = turn.toString();
        document.getElementById("t-dollars").innerHTML = amount.toString();
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', (amount * 2), 7);

    }

    function chooseLiability() {
        var turn = parseInt(document.getElementById("turn").innerHTML);
        var turn = turn + 1;
        var amount = parseInt(document.getElementById("t-dollars").innerHTML);
        var amount = amount * 2;
        
        // var rand = Math.floor(Math.random() * 90) + 10;
        // document.getElementById("h1").innerHTML = "Turn: " + turn + " T-Dollars: " + (amount * 2);
        // document.getElementById("turn").innerHTML = (turn + 1)
        document.getElementById('turn').innerHTML = turn.toString();
        document.getElementById("t-dollars").innerHTML = amount.toString();
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', (amount * 2), 7);

    }
</script>
<div>
  <id="game" align=center style="text_align:center">
     <body onload="checkCookie()">
        <h1>Turn:<span id='turn'></span></h1> <h1>T-Dollars:<span id='t-dollars'></span></h1><br>
        <h2 id='h2'>Wealth:</h2>
        <h3 id='asset'>Asset</h3>
        <h3 id='liability'>Liability</h3>

        <button onclick="chooseAsset()" style="background-color:yellow;margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-bottom:0%">Asset</button>  
        <button onclick="chooseLiability()" style="background-color:yellow;margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-bottom:0%">Liability</button>
        <button onclick="resetProgress()" style="background-color:yellow;margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-bottom:0%">Reset Progress</button>

     </body>


</div>