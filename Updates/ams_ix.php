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
$ix = $_POST['ix_name'];

// Update data to database;
$sql = "UPDATE ams_ix
           SET name='$nama',
               as_number='$as',
               ip_peering='$ipaddr1',
               ip_peering_2='$ipaddr2',
               ipv6_peering='$ipaddrv6',
               community='$com',
               ix_name='$ix'
           WHERE id='$id'";

if (mysqli_query($koneksi,$sql)) {

// Create an output text file from the inputs;
// Set a name & directory file for the ouput;
$tz = new DateTimeZone("Asia/Jakarta");
$date = new DateTime('now',$tz);
$now =  date_format($date, 'Y-m-d');
$dir = $_SERVER['DOCUMENT_ROOT'].'/route-list/output/';
$file = $dir.'['.$now.']'.'_'.$nama.'_'.$ix.'_'.'updated.txt';
// The data;
$d1 = "route-map ".$ix."-exchange-". $nama ."-in permit 10
Match rpki invalid
Set local-preference 80

route-map ".$ix."-exchange-". $nama ."-in permit 20
Match ip address prefix-lists less-equal-slash-24
Match rpki not-found
Set local-preference 150
set community ". $com ."

route-map ".$ix."-exchange-". $nama ."-in permit 30
Match ip address prefix-lists less-equal-slash-24
Match rpki valid
Set local-preference 150
Set community ". $com ."\n
#========== IP Address 1 ===========#
neighbor ". $ipaddr1 ." remote-as ". $as ."
neighbor ". $ipaddr1 ." peer-group ".$ix."-ix-peers
neighbor ". $ipaddr1 ." shutdown
neighbor ". $ipaddr1 ." description Connection to ". $nama ."
address-family ipv4 unicast
neighbor ". $ipaddr1 ." activate
neighbor ". $ipaddr1 ." $nama ".$ix."-exchange-". $nama ."-in in
neighbor ". $ipaddr1 ." maximum-prefix 20 restart 120";

// The data;
$d2 = "route-map ".$ix."-exchange-". $nama ."-in permit 10
Match rpki invalid
Set local-preference 80

route-map ".$ix."-exchange-". $nama ."-in permit 20
Match ip address prefix-lists less-equal-slash-24
Match rpki not-found
Set local-preference 150
set community ". $com ."

route-map ".$ix."-exchange-". $nama ."-in permit 30
Match ip address prefix-lists less-equal-slash-24
Match rpki valid
Set local-preference 150
Set community ". $com ."\n
#========== IP Address 1 ===========#
neighbor ". $ipaddr1 ." remote-as ". $as ."
neighbor ". $ipaddr1 ." peer-group ".$ix."-ix-peers
neighbor ". $ipaddr1 ." shutdown
neighbor ". $ipaddr1 ." description Connection to ". $nama ."
address-family ipv4 unicast
neighbor ". $ipaddr1 ." activate
neighbor ". $ipaddr1 ." $nama ".$ix."-exchange-". $nama ."-in in
neighbor ". $ipaddr1 ." maximum-prefix 20 restart 120\n
#========== IPv6 Address ===========#
neighbor ". $ipaddrv6 ." remote-as ". $as ."
neighbor ". $ipaddrv6 ." peer-group ".$ix."-ix-peers-v6
neighbor ". $ipaddrv6 ." description Connection to booking
neighbor ". $ipaddrv6 ." activate
neighbor ". $ipaddrv6 ." weight 1000
neighbor ". $ipaddrv6 ." ". $nama ." ".$ix."-exchange-booking-in in";

// The data;
$d3 = "route-map ".$ix."-exchange-". $nama ."-in permit 10
Match rpki invalid
Set local-preference 80

route-map ".$ix."-exchange-". $nama ."-in permit 20
Match ip address prefix-lists less-equal-slash-24
Match rpki not-found
Set local-preference 150
set community ". $com ."

route-map ".$ix."-exchange-". $nama ."-in permit 30
Match ip address prefix-lists less-equal-slash-24
Match rpki valid
Set local-preference 150
Set community ". $com ."\n
#========== IP Address 1 ===========#
neighbor ". $ipaddr1 ." remote-as ". $as ."
neighbor ". $ipaddr1 ." peer-group ".$ix."-ix-peers
neighbor ". $ipaddr1 ." shutdown
neighbor ". $ipaddr1 ." description Connection to ". $nama ."
address-family ipv4 unicast
neighbor ". $ipaddr1 ." activate
neighbor ". $ipaddr1 ." $nama ".$ix."-exchange-". $nama ."-in in
neighbor ". $ipaddr1 ." maximum-prefix 20 restart 120\n
#========== IP Address 2 ===========#
neighbor ". $ipaddr2 ." remote-as ". $as ."
neighbor ". $ipaddr2 ." peer-group ".$ix."-ix-peers
neighbor ". $ipaddr2 ." shutdown
neighbor ". $ipaddr2 ." description Connection to ". $nama ."
address-family ipv4 unicast
neighbor ". $ipaddr2 ." activate
neighbor ". $ipaddr2 ." $nama ".$ix."-exchange-". $nama ."-in in
neighbor ". $ipaddr2 ." maximum-prefix 20 restart 120\n
#========== IPv6 Address ===========#
neighbor ". $ipaddrv6 ." remote-as ". $as ."
neighbor ". $ipaddrv6 ." peer-group ".$ix."-ix-peers-v6
neighbor ". $ipaddrv6 ." description Connection to booking
neighbor ". $ipaddrv6 ." activate
neighbor ". $ipaddrv6 ." weight 1000
neighbor ". $ipaddrv6 ." ". $nama ." ".$ix."-exchange-booking-in in";

if(empty($ipaddrv6) AND empty($ipaddr2)){
    $data = $d1;
} else if (empty($ipaddr2)) {
    # code...
    $data = $d2;
} else {
    # code...
    $data = $d3;
}

file_put_contents($file, $data) or die("Unable to open file!");

// Get to the last page;
header("location:../list.php");

$filename = $file;
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-checked=0, pre-checked=0');
header('Cache-Control: private',false);
header('Content-Type: plain/text');

header('Content-Disposition: attachment; filename="'. basename($filename) . '";');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($filename));

readfile($filename);

unlink($file);

exit;

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>