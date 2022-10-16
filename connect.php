<?php
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "me";

$db = mysqli_connect($host, $username, $password, $dbname);
if (!$db){
        die("Connection Failed:".mysqli_connect_error());
    }
    
date_default_timezone_set('Asia/Jakarta');  


?>