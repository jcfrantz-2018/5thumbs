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
  <title>Asset</title>
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
$asset_dao = new assetDAO();
$liability_dao = new liabilityDAO();

$amount = $dao->getT_DollarsbyUsername($username);
$turn = 11;

$initial_happiness = 75;
setcookie('happiness_level', $initial_happiness, 0, '/');

$asset_qns = $asset_dao->retrieveRandomAsset(10);
$liability_qns = $liability_dao->retrieveRandomLiability(10);

// $liability_name = $liability_qns[0]->getname();
// $liability_value = $liability_qns[0]->getvalue();
// $liability_happiness = $liability_qns[0]->gethappiness();

// $asset_name = $asset_qns[0]->getname();
// $asset_value = $asset_qns[0]->getvalue();
$i = 1;
$j = 1;
foreach($asset_qns as $asset) {
    $name = $asset->getname();
    $value = $asset->getvalue();
    $assetname = 'assetname' . strval($i);
    $assetvalue = 'assetvalue' . strval($i);
    setcookie($assetname, $name, 0, "/");
    setcookie($assetvalue, $value, 0, "/");
    $i++;
}

foreach($liability_qns as $liability) {
    $name = $liability->getname();
    $value = $liability->getvalue();
    $happiness = $liability->gethappiness();
    $liabilityname = 'liabilityname' . strval($j);
    $liabilityvalue = 'liabilityvalue' . strval($j);
    $liabilityhappiness = 'liabilityhappiness' . strval($j);
    setcookie($liabilityname, $name, 0, "/");
    setcookie($liabilityvalue, $value, 0, "/");
    setcookie($liabilityhappiness, $happiness, 0, "/");
    $j++;
}
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
        var happiness = "<?php echo $initial_happiness ?>"
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', amount.toString(), 7);
        setCookie('happiness_level', happiness.toString(), 7);
        document.getElementById('turn').innerHTML = turn.toString();
        document.getElementById("t-dollars").innerHTML = amount.toString();
        document.getElementById("happiness_level").innerHTML = happiness.toString();
    }

    function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    decodedCookie = decodedCookie.replace('+', ' ');
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

    function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }

    function checkCookie() {
        var amount = getCookie("amount");
        var turn = getCookie("turn");
        var happiness = getCookie("happiness_level");

        var asset_name = getCookie("assetname1");
        var asset_value = getCookie("assetvalue1");

        var liability_name = getCookie("liabilityname1");
        var liability_value = getCookie("liabilityvalue1");
        var liability_happiness = getCookie("liabilityhappiness1");

        var num_of_turns = 1;
        setCookie('num_of_turns', num_of_turns, 7);

        if (amount == '' || turn == '') {
            var amount = "<?php echo $amount ?>";
            var turn = "<?php echo $turn ?>";
        }
        document.getElementById('turn').innerHTML = turn;
        document.getElementById('t-dollars').innerHTML = amount;
        document.getElementById('happiness_level').innerHTML = happiness;
        
        document.getElementById('asset_name').innerHTML = asset_name;
        document.getElementById('asset_value').innerHTML = asset_value;

        document.getElementById('liability_name').innerHTML = liability_name.replace('+',' ');
        document.getElementById('liability_value').innerHTML = liability_value;
        document.getElementById('liability_happiness').innerHTML = liability_happiness;
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

        var num_of_turns = parseInt(getCookie("num_of_turns"));
        num_of_turns = num_of_turns + 1;
        var num_of_turns = num_of_turns.toString();
        setCookie('num_of_turns', num_of_turns, 7);

        var happiness_level = parseInt(getCookie("happiness_level"));
        happiness_level = happiness_level - 5;
        setCookie('happiness_level', happiness_level.toString(), 7);
        document.getElementById("happiness_level").innerHTML = happiness_level;

        var asset_name = "assetname"
        asset_name = asset_name.concat(num_of_turns);

        var asset_value = "assetvalue"
        asset_value = asset_value.concat(num_of_turns);

        var liability_name = "liabilityname"
        liability_name = liability_name.concat(num_of_turns);
        var liability_value = "liabilityvalue"
        liability_value = liability_value.concat(num_of_turns);

        document.getElementById("asset_name").innerHTML = getCookie(asset_name);
        document.getElementById("asset_value").innerHTML = getCookie(asset_value);
        document.getElementById("liability_name").innerHTML = getCookie(liability_name);
        document.getElementById("liability_value").innerHTML = getCookie(liability_value);


        var table = document.getElementById("myTableData");
        var i;
        for (var i = 0, row;row = table.rows[i]; i++) {
            var investment_type = row.cells[2].innerHTML;
            if (investment_type == "Asset") {
                let value = parseInt(row.cells[3].innerHTML);
                value = value + 5;
                row.cells[3].innerHTML = value;
            }
            else if (investment_type == "Liability") {
                let value = parseInt(row.cells[3].innerHTML);
                value = value - 1;
                row.cells[3].innerHTML = value;
            }
        }

        addRow(item, 'Asset', value);

    }

    function chooseLiability() {

        var turn = parseInt(document.getElementById("turn").innerHTML);
        turn = turn + 1;

        var amount = parseInt(document.getElementById("t-dollars").innerHTML);
        
        var item = document.getElementById("liability_name").innerHTML;

        var value = parseInt(document.getElementById("liability_value").innerHTML);
        
        amount = amount - value;

        
        document.getElementById('turn').innerHTML = turn.toString();
        document.getElementById("t-dollars").innerHTML = amount.toString();
        setCookie('turn', turn.toString(), 7);
        setCookie('amount', amount.toString(), 7);

        var num_of_turns = parseInt(getCookie("num_of_turns"));

        var happiness_level = parseInt(getCookie("happiness_level"));
        var happiness = "liabilityhappiness";
        happiness = happiness.concat(num_of_turns.toString());
        happiness_gain = parseInt(getCookie(happiness));
        happiness_level = happiness_level + happiness_gain;
        setCookie('happiness_level', happiness_level.toString(), 7);
        document.getElementById("happiness_level").innerHTML = happiness_level;

        num_of_turns = num_of_turns + 1;
        var num_of_turns = num_of_turns.toString();
        setCookie('num_of_turns', num_of_turns, 7);

        var asset_name = "assetname"
        asset_name = asset_name.concat(num_of_turns);

        var asset_value = "assetvalue"
        asset_value = asset_value.concat(num_of_turns);

        var liability_name = "liabilityname"
        liability_name = liability_name.concat(num_of_turns);
        var liability_value = "liabilityvalue"
        liability_value = liability_value.concat(num_of_turns);

        document.getElementById("asset_name").innerHTML = getCookie(asset_name);
        document.getElementById("asset_value").innerHTML = getCookie(asset_value);
        document.getElementById("liability_name").innerHTML = getCookie(liability_name);
        document.getElementById("liability_value").innerHTML = getCookie(liability_value);

        addRow(item,'Liability',value);

    }

    

</script>
<div>
  <id="game" align=center style="text_align:center">
     <body onload="checkCookie()">
        
        <h1>Turn:<span id='turn'> </span></h1> 
        <h1>T-Dollars:<span id='t-dollars'> </span></h1>
        <h1>Happiness level:<span id='happiness_level'> </span></h1><br>
        <h1> Invest in assets and liabilities!<br>
         Assets gain value over time, 
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
        <h3><span id='asset_name'><?php echo $asset_name; ?></span>->
            <span id='asset_value'><?php echo $asset_value; ?></span> t-dollars: 
            <span id='asset_desc'>Expensive, but increases its value over time</span>
        </h3>
        </div>
    <br>
        <div class="liability">
        <h3>
        <span id='liability_name'><?php echo $liability_name; ?></span>->
        <span id='liability_value'><?php echo $liability_value; ?></span> t-dollars: 
        <span id='liability_desc'>Makes you happier by </span><span id='liability_happiness'></span> points
        </h3>
        </div>
    <div class="centre">
    <br>
        <button onclick="chooseAsset()" style="margin-left:auto;margin-right:auto;display:inline-block;margin-auto:0%" class="btn btn-secondary" >Asset</button>  
        <button onclick="chooseLiability()" style="margin-left:auto;margin-right:auto;display:inline-block;margin-auto:0%" class="btn btn-secondary" >Liability</button>
        <button onclick="resetProgress()" style="margin-left:auto;margin-right:auto;display:inline-block;margin-auto:0%" class="btn btn-secondary" >Reset Progress</button>
    </div>
     </body>


</div>