<?php
// Connection to Database;
include '../conn/connection.php';

// Catch data;
$id = $_POST['id'];
$nama = $_POST['nm'];
$as = $_POST['as_nm'];
$ipaddr1 = $_POST['ipaddr1'];
$ipaddr2 = $_POST['ipaddr2'];
$ipaddrv6 =  $_POST['ipaddrv6'];
$com = $_POST['com'];
$ix = $_POST['ix'];

// Update data to database;
$sql = "UPDATE AMS_IX
           SET name='$nama',
               as_number='$as',
               ip_peering='$ipaddr1',
               ip_peering_2='$ipaddr2',
               ipv6_peering='$ipaddrv6',
               community='$com',
               ix_name='$ix'
           WHERE id='$id'";

if (mysqli_query($koneksi,$sql)) {
    echo "record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
// Get to the last page;
header("location:../list.php");
?>