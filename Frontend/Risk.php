<?php

require_once '../Backend/common.php';

$username = $_SESSION['username'];

?>

<?php

$dao = new T_DollarsDAO();

$amount = $dao->getT_DollarsbyUsername($username);
echo $amount;
$turn = 1;

echo '<br>
      <button onclick="myRisk()">Risk</button>
      <script type="text/JavaScript">
      function myRisk() {
        var rand;
        rand = Math.floor(Math.random() * 90) + 10;

        if(rand > 50){
       return $amount echo * 1.5
    } else {
       return $amount * 0.75
    }
}
      </script>

    
      <button onclick="mySafe()">Safe</button>
      <br>';


?>