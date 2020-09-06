<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Start</title>
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
<section class="padd-section text-center wow fadeInUp">
<div class="container">
<?php

require_once '../Backend/common.php';
require_once '../Backend/ConnectionManager.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userinfo";
    
$conn = new mysqli($servername, $username, $password, $dbname);
    
$sql = "SELECT username, T_Dollars FROM T_Dollars ORDER by T_Dollars desc";
$result = $conn->query($sql);

$count = 0; 
if (($result->num_rows) > 0 and ($count<1)) {
// output data of each row
echo "<table class='table'>
        <div class='feature-block'>
        <tr>
          <th>Username</th>
          <th>T Dollars</th>
        </tr>
";

while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["username"]."</td>"."<td>".$row["T_Dollars"]."</td></tr>";
    $count = $count + 1;
}
echo "</table>";
}
else {
echo "Still looking for our leaders!";
}

$conn->close();
?>
</div>
</body>