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
$turn = 0;
?>

<script>

    // function deleteRow(obj) {
        
    //     var index = obj.parentNode.parentNode.rowIndex;
    //     var table = document.getElementById("myTableData");
    //     console.log(index);
    //     var value = parseInt(document.getElementById("myTableData").rows[index].cells[3].innerHTML);
    //     console.log(value);
    //     var amount = parseInt(document.getElementById("t-dollars").innerHTML);
    //     amount = amount + value;
    //     document.getElementById("t-dollars").innerHTML = amount.toString();
    //     setCookie('amount', amount.toString(), 7);

    //     table.deleteRow(index);
        
    // }

    // function addRow(item,type,value) {
          
    //       var item_chosen = item;
    //       var item_type = type;
    //       var item_value = value;
    //       var table = document.getElementById("myTableData");
       
    //       var rowCount = table.rows.length;
    //       var row = table.insertRow(rowCount);
       
    //       row.insertCell(0).innerHTML= '<input type="button" value = "Sell" onClick="Javacsript:deleteRow(this)">';
    //       row.insertCell(1).innerHTML= item_chosen;
    //       row.insertCell(2).innerHTML= item_type;
    //       row.insertCell(3).innerHTML= item_value;
       
    // }

    function resetProgress() {
        var amount = "<?php echo $amount ?>";
        var turn = "<?php echo $turn ?>";
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', amount.toString(), 7);
        document.getElementById('turn').innerHTML = turn.toString();
        document.getElementById("t-dollars").innerHTML = amount.toString();

        setCookie('happiness', happiness.toString(), 7);
        setCookie('wealth', wealth.toString(), 7);
        document.getElementById('happiness').innerHTML = happiness.toString();
        document.getElementById('wealth').innerHTML = wealth.toString();
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

    function chooseWithdraw() {
//still editing
        var turn = parseInt(document.getElementById("turn").innerHTML);
        turn = turn + 1;

        var amount = parseInt(document.getElementById("t-dollars").innerHTML);
        
        var item = document.getElementById("withdraw_name").innerHTML;

        var value = parseInt(document.getElementById("withdraw_value").innerHTML);

        amount = amount - value;

        var wealth = parseInt(document.getElementById("wealth").innerHTML);
        var happiness = parseInt(document.getElementById("happiness").innerHTML);
       
        wealth = wealth - 1;
        happiness = happiness + 1;

        document.getElementById('turn').innerHTML = turn.toString();
        document.getElementById("t-dollars").innerHTML = amount.toString();
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', amount.toString(), 7);

        document.getElementById('wealth').innerHTML = wealth.toString();
        document.getElementById("happiness").innerHTML = happiness.toString();
        setCookie('wealth', turn.toString(), 7);
        setCookie('happiness', turn.toString(), 7);
    }
    function chooseDeposit() {
//still editing
        var turn = parseInt(document.getElementById("turn").innerHTML);
        turn = turn + 1;

        var amount = parseInt(document.getElementById("t-dollars").innerHTML);

        var item = document.getElementById("deposit_name").innerHTML;

        var value = parseInt(document.getElementById("deposit_value").innerHTML);
        
        var wealth = parseInt(document.getElementById("wealth").innerHTML);
        var happiness = parseInt(document.getElementById("happiness").innerHTML);

        var delayInMilliseconds = 5000; //5 seconds
        setTimeout(function() {
            amount = amount + 2;
        }, delayInMilliseconds);

        amount = amount + value;
        wealth = wealth + 1;

        document.getElementById('turn').innerHTML = turn.toString();
        document.getElementById('t-dollars').innerHTML = amount.toString();
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', amount.toString(), 7);

        document.getElementById('wealth').innerHTML = wealth.toString();
        setCookie('wealth', wealth.toString(), 7);
    }
    function chooseInvest() {
//still editing
        var turn = parseInt(document.getElementById("turn").innerHTML);
        turn = turn + 1;

        var amount = parseInt(document.getElementById("t-dollars").innerHTML);
        
        var item = document.getElementById("invest_name").innerHTML;

        var value = parseInt(document.getElementById("invest_value").innerHTML);
        

        amount = amount - value;

        var wealth = parseInt(document.getElementById("wealth").innerHTML);
        var happiness = parseInt(document.getElementById("happiness").innerHTML);
       
        wealth = wealth - 1;
        happiness = happiness + 1;

        document.getElementById('turn').innerHTML = turn.toString();
        document.getElementById("t-dollars").innerHTML = amount.toString();
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', amount.toString(), 7);

        document.getElementById('wealth').innerHTML = wealth.toString();
        document.getElementById("happiness").innerHTML = happiness.toString();
        setCookie('wealth', turn.toString(), 7);
        setCookie('happiness', turn.toString(), 7);
    }

</script>
<div>
<h1>Deposit, invest or withdraw?<br><br></h1>
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

        <h1>Turn: <span id='turn'></span></h1> <h1>T-Dollars: <span id='t-dollars'></span></h1><br>
        <br><br>
        <h2 id='h2'>Wealth:<span id='wealth'> 0</span></h2>
        <h2 id='h2'>Happiness:<span id='happiness'> 0</span></h2>

        <div class="withdraw">
        <h3><span id='withdraw_name'>Living expenses</span>->
            <span id='withdraw_value'>1</span> t-dollars: 
            <span id='withdraw_desc'>Withdrawing money allows you to buy things and increases your happiness</span>
        </h3>   
        </div>
    <br>
        <container>
        <div class="deposit">
        <h3>
        <span id='deposit_name'>Deposit</span>->
        <span id='deposit_value'>5</span> t-dollars: 
        <span id ='deposit_desc'>Depositing money allows you to earn passively. When you deposit, you will earn 10% interest of money after 20s.</span> 
        </h3>
        </div>
        
        <div class="invest">
        <h3>
        <span id='invest_name'>Invest</span>->
        <span id='invest_value'>5</span> t-dollars: 
        <span id ='invest_desc'>Investing money allows you to earn in the long run. When you invest, you will earn 10% interest.</span> 
        </h3>
        </div>
        <div>
        <button onclick="chooseWithdraw()" style="margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-auto:0%" class="btn btn-secondary">Withdraw</button>  
        <button id="depositBtn" onclick="chooseDeposit()" style="margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-auto:0%" class="btn btn-secondary">Deposit</button>
        <button onclick="chooseInvest()" style="margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-auto:0%" class="btn btn-secondary">Invest</button>
        <button onclick="resetProgress()" style="margin-left:auto;margin-right:auto;display:inline-block;margin-top:22%;margin-auto:0%" class="btn btn-secondary">Reset Progress</button>
    </div>
    </container>
     </body>


</div>