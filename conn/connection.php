<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = 'route-list';

$koneksi = mysqli_connect($servername,$username,$password,$db);
// Check connection;
if (!$koneksi) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>