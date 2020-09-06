<?php

require_once '../Backend/common.php';
require_once '../Backend/FinanceAPI.php';
require_once 'header.php';

if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}


if (isset($_SESSION['market_summary'])){
    $market_summary = $_SESSION['market_summary']; 
    $market_info = $market_summary['marketSummaryResponse']['result']; 
}



?>

<!DOCTYPE html>


<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Investment</title>
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

  <style>
  h1 {
  text-align: center;
}

h2 {
    text-align: center;
}

table.center {
    margin-left:auto;
    margin-right:auto;
}

.asset {
  margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
}

.liability {
  margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
}
  </style>
</head>

<?php


$dao = new T_DollarsDAO();

$amount = $dao->getT_DollarsbyUsername($username);
$turn = 11;
?>

<script>

    function deleteRow(obj) {
        
        var index = obj.parentNode.parentNode.rowIndex;
        var table = document.getElementById("myTableData");
        console.log(index);
        var value = parseInt(document.getElementById("myTableData").rows[index].cells[3].innerHTML);
        console.log(value);
        var amount = parseInt(document.getElementById("t-dollars").innerHTML);
        amount = amount + value;
        document.getElementById("t-dollars").innerHTML = amount.toString();
        setCookie('amount', amount.toString(), 7);

        table.deleteRow(index);
        
    }

    function addRow(item,type,value) {
          
          var item_chosen = item;
          var item_type = type;
          var item_value = value;
          var table = document.getElementById("myTableData");
       
          var rowCount = table.rows.length;
          var row = table.insertRow(rowCount);
       
          row.insertCell(0).innerHTML= '<input type="button" value = "Sell" onClick="Javacsript:deleteRow(this)">';
          row.insertCell(1).innerHTML= item_chosen;
          row.insertCell(2).innerHTML= item_type;
          row.insertCell(3).innerHTML= item_value;
       
    }

    function resetProgress() {
        var amount = "<?php echo $amount ?>";
        var turn = "<?php echo $turn ?>";
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', amount.toString(), 7);
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
        turn = turn + 1;

        var amount = parseInt(document.getElementById("t-dollars").innerHTML);
        
        var item = document.getElementById("asset_name").innerHTML;

        var value = parseInt(document.getElementById("asset_value").innerHTML);

        amount = amount - value;
        
        // var rand = Math.floor(Math.random() * 90) + 10;
        // document.getElementById("h1").innerHTML = "Turn: " + turn + " T-Dollars: " + (amount * 2);
        // document.getElementById("turn").innerHTML = (turn + 1)
        document.getElementById('turn').innerHTML = turn.toString();
        document.getElementById("t-dollars").innerHTML = amount.toString();
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', amount.toString(), 7);

        addRow(item, 'Asset', value);

    }

    function chooseLiability() {

        var turn = parseInt(document.getElementById("turn").innerHTML);
        turn = turn + 1;

        var amount = parseInt(document.getElementById("t-dollars").innerHTML);
        
        var item = document.getElementById("liability_name").innerHTML;

        var value = parseInt(document.getElementById("liability_value").innerHTML);
        
        amount = amount - value;

        // var rand = Math.floor(Math.random() * 90) + 10;
        // document.getElementById("h1").innerHTML = "Turn: " + turn + " T-Dollars: " + (amount * 2);
        // document.getElementById("turn").innerHTML = (turn + 1)
        document.getElementById('turn').innerHTML = turn.toString();
        document.getElementById("t-dollars").innerHTML = amount.toString();
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', amount.toString(), 7);

        addRow(item,'Liability',value);

    }

    

</script>
<div>
  <id="game" align=center style="text_align:center">
     <body onload="checkCookie()">

     <table id="MarketData" class="center"  border="1" cellpadding="2">
        <tr>
            
            <td><b>Exchange Name</b></td>
            <td><b>Symbol</b></td>
            <td><b>Change</b></td>
            <td><b>Price</b></td>
        </tr>
        <?php
        foreach ($market_info as $one_market){
            echo "<tr>
                    <td>{$one_market['fullExchangeName']}</td>
                    <td>{$one_market['symbol']}</td>
                    <td>{$one_market['regularMarketChangePercent']['fmt']}</td>
                    <td>{$one_market['regularMarketPrice']['fmt']}</td>
            </tr>"; 
        }
        ?>
        </table><br><br>

        
        <h1>Turn:<span id='turn'></span></h1> <h1>T-Dollars:<span id='t-dollars'></span></h1><br>
        <h1> Invest in assets and liabilities!<br> Assets gain value over time, 
        while liabilities give immediate bonuses</h1><br><br>
        <h2 id='h2'>Wealth:</h2>
        
        
        <table id="myTableData" class="center"  border="1" cellpadding="2">
        <tr>
            <td>&nbsp;</td>
            <td><b>Item</b></td>
            <td><b>Type</b></td>
            <td><b>Value</b></td>
        </tr>
        </table><br><br>

        <div class="asset">
        <h3><span id='asset_name'>50g bar of gold</span>->
            <span id='asset_value'>10</span> t-dollars: 
            <span id='asset_desc'>Expensive, but increases its value over time</span>
        </h3>
        </div>
    <br>
        <div class="liability">
        <h3>
        <span id='liability_name'>Apple Airpods</span>->
        <span id='liability_value'>5</span> t-dollars: 
        <span id ='liability_desc'>Increases your happiness greatly</span> 
        </h3>
        </div>

        <button onclick="chooseAsset()" style="background-color:yellow;margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-auto:0%">Asset</button>  
        <button onclick="chooseLiability()" style="background-color:yellow;margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-auto:0%">Liability</button>
        <button onclick="resetProgress()" style="background-color:yellow;margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-auto:0%">Reset Progress</button>

     </body>


</div>