<?php
include '../conn/connection.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi,"select * from ams_ix where id ='$id' ");
while($d = mysqli_fetch_array($data)){
// catch sended data in form;
$nama = $d['name'];
$as = $d['as_number'];
$ipaddr1 = $d['ip_peering'];
$ipaddr2 = $d['ip_peering_2'] ?? NULL;
$ipaddrv6 = $d['ipv6_peering'] ?? NULL;
$com = $d['community'];
$ix = $d['ix_name'];

// Create an output text file from the inputs;
// Set a name & directory file for the ouput;
$tz = new DateTimeZone("Asia/Jakarta");
$date = new DateTime('now',$tz);
$now =  date_format($date, 'Y-m-d');
$dir = $_SERVER['DOCUMENT_ROOT'].'/route-list/output/';
$file = $dir.'['.$now.']'.'_'.$nama.'_'.$ix.'_'.'export.txt';

    // The data;
$data = "route-map ams-exchange-". $nama ."-in permit 10
Match rpki invalid
Set local-preference 80

route-map ams-exchange-". $nama ."-in permit 20
Match ip address prefix-lists less-equal-slash-24
Match rpki not-found
Set local-preference 150
set community ". $com ."

route-map ams-exchange-". $nama ."-in permit 30
Match ip address prefix-lists less-equal-slash-24
Match rpki valid
Set local-preference 150
Set community ". $com ."\n
#========== IP Address 1 ===========#
neighbor ". $ipaddr1 ." remote-as ". $as ."
neighbor ". $ipaddr1 ." peer-group ams-ix-peers
neighbor ". $ipaddr1 ." shutdown
neighbor ". $ipaddr1 ." description Connection to ". $nama ."
address-family ipv4 unicast
neighbor ". $ipaddr1 ." activate
neighbor ". $ipaddr1 ." $nama ams-exchange-". $nama ."-in in
neighbor ". $ipaddr1 ." maximum-prefix 20 restart 120\n
#========== IPv6 Address ===========#
neighbor ". $ipaddrv6 ." remote-as ". $as ."
neighbor ". $ipaddrv6 ." peer-group ams-ix-peers-v6
neighbor ". $ipaddrv6 ." description Connection to booking
neighbor ". $ipaddrv6 ." activate
neighbor ". $ipaddrv6 ." weight 1000
neighbor ". $ipaddrv6 ." ". $nama ." ams-exchange-booking-in in";

file_put_contents($file, $data) or die("Unable to open file!");

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
};
?>