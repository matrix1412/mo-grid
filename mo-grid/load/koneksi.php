<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'dbmonitoring';
 
$koneksi = mysqli_connect($host, $user, $pass, $dbname); 
$connect = new PDO("mysql:host=localhost;dbname=dbmonitoring", "root", "");

?>