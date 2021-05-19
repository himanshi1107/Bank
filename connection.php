<?php

// Remote Database Connection
$servername = "remotemysql.com";
$username = "hr22Db2UlY";
$password = "lkBFBdPrDP";
$db = "hr22Db2UlY";

// Development Connection
// $servername = "localhost";
// $username = "root";
// $password = "";
// $db = "bankusers";

$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection

if ($conn) {
    
}
else{
    die("No Connection" . mysqli_connect_error());
}

?>