<?php
class ConnectionManager {
  public function getConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";  
    $dbname = "userinfo";
    
    return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     
  }
}
?>