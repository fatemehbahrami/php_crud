<?php
$host = "localhost";
$dbname = "kimia";
$user = "root";
$pass = "bahrami";
  
try {
    $dbh = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);
}
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>