<?php

$dbname   = 'mydb';
$username = 'myuser';
$password = 'mypassword';
try {
    $pdo = new \PDO("mysql:host=localhost;dbname=$dbname", $username,  $password);
} catch (Exception $e) {
    print $e->getMessage() . "\n";
}
print "OK\n";