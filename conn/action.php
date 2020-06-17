<?php
    // Connection to database;
    include 'connection.php';

    // catch sended data in form;
    $nama = $_POST['nm'];
    $as = $_POST['as_nm'];
    $ipaddr1 = $_POST['ipaddr1'];
    $ipaddr2 = $_POST['ipaddr2'];
    $ipaddrv6 = $_POST['ipaddrv6'] ?? NULL;
    $com = $_POST['com'];

    // Inserting values to database;
    $sql = "INSERT
              INTO
            ams_ix
            VALUES ('','$nama','$as','$ipaddr1','$ipaddrv6','$com'),
                   ('','$nama','$as','$ipaddr2','$ipaddrv6','$com')";

    if (mysqli_query($koneksi,$sql)) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    // Create an output text file from the inputs;
    // Set a name & directory file for the ouput;
    $tz = new DateTimeZone("Asia/Jakarta");
    $date = new DateTime('now',$tz);
    $now =  date_format($date, 'Y-m-d_H-i');
    $dir = $_SERVER['DOCUMENT_ROOT'].'/route-list/output/';
    $file = $dir.'['.$now.']'.'_'.$nama.'_'.'data_export.txt';

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
#========== IPv6 Address ===========#\n
neighbor ". $ipaddrv6 ." remote-as ". $as ."
neighbor ". $ipaddrv6 ." peer-group ams-ix-peers-v6
neighbor ". $ipaddrv6 ." description Connection to booking
neighbor ". $ipaddrv6 ." activate
neighbor ". $ipaddrv6 ." weight 1000
neighbor ". $ipaddrv6 ." ". $nama ." ams-exchange-booking-in in";

// $data2 = "route-map ams-exchange-". $nama ."-in permit 10
// Match rpki invalid
// Set local-preference 80

// route-map ams-exchange-". $nama ."-in permit 20
// Match ip address prefix-lists less-equal-slash-24
// Match rpki not-found
// Set local-preference 150
// set community ". $com ."

// $nama ams-exchange-Incapsula-in permit 30
// Match ip address prefix-lists less-equal-slash-24
// Match rpki valid
// Set local-preference 150
// Set community ". $com ."\n
// #========== IP Address 1 ===========#\n
// neighbor ". $ipaddr1 ." remote-as ". $as ."
// neighbor ". $ipaddr1 ." peer-group ams-ix-peers
// neighbor ". $ipaddr1 ." shutdown
// neighbor ". $ipaddr1 ." description Connection to Incapsula
// address-family ipv4 unicast
// neighbor ". $ipaddr1 ." activate
// neighbor ". $ipaddr1 ." $nama ams-exchange-Incapsula-in in
// neighbor ". $ipaddr1 ." maximum-prefix 20 restart 120\n
// #========== IP Address 2 ===========#\n
// neighbor ". $ipaddr2 ." remote-as ". $as ."
// neighbor ". $ipaddr2 ." peer-group ams-ix-peers
// neighbor ". $ipaddr2 ." shutdown
// neighbor ". $ipaddr2 ." description Connection to Incapsula
// address-family ipv4 unicast
// neighbor ". $ipaddr2 ." activate
// neighbor ". $ipaddr2 ." $nama ams-exchange-Incapsula-in in
// neighbor ". $ipaddr2 ." maximum-prefix 20 restart 120\n
// #========== IPv6 Address ===========#\n
// neighbor ". $ipaddrv6 ." remote-as ". $as ."
// neighbor ". $ipaddrv6 ." peer-group ams-ix-peers-v6
// neighbor ". $ipaddrv6 ." description Connection to booking
// neighbor ". $ipaddrv6 ." activate
// neighbor ". $ipaddrv6 ." weight 1000
// neighbor ". $ipaddrv6 ." ". $nama ." ams-exchange-booking-in in";

//     if (empty($ipaddrv6)) {
//         $data = $data1;
//     } else {
//         $data = $data2;
//     }

// Create an output text file from the inputs;
// Set a name & directory file for the ouput;
// $tz = new DateTimeZone("Asia/Jakarta");
// $date = new DateTime('now',$tz);
// $now =  date_format($date, 'Y-m-d_H-i');
// $dir = $_SERVER['DOCUMENT_ROOT'].'/route-list/output/';
// $file = $dir.'['.$now.']'.'_'.$nama.'_'.$ix.'_'.'update.txt';

//     // The data;
// $data = "route-map ".$ix."-exchange-". $nama ."-in permit 10
// Match rpki invalid
// Set local-preference 80

// route-map ".$ix."-exchange-". $nama ."-in permit 20
// Match ip address prefix-lists less-equal-slash-24
// Match rpki not-found
// Set local-preference 150
// set community ". $com ."

// route-map ".$ix."-exchange-". $nama ."-in permit 30
// Match ip address prefix-lists less-equal-slash-24
// Match rpki valid
// Set local-preference 150
// Set community ". $com ."\n
// #========== IP Address 1 ===========#
// neighbor ". $ipaddr1 ." remote-as ". $as ."
// neighbor ". $ipaddr1 ." peer-group ".$ix."-ix-peers
// neighbor ". $ipaddr1 ." shutdown
// neighbor ". $ipaddr1 ." description Connection to ". $nama ."
// address-family ipv4 unicast
// neighbor ". $ipaddr1 ." activate
// neighbor ". $ipaddr1 ." $nama ".$ix."-exchange-". $nama ."-in in
// neighbor ". $ipaddr1 ." maximum-prefix 20 restart 120\n
// #========== IP Address 2 ===========#\n
// neighbor ". $ipaddr2 ." remote-as ". $as ."
// neighbor ". $ipaddr2 ." peer-group ".$ix."-ix-peers
// neighbor ". $ipaddr2 ." shutdown
// neighbor ". $ipaddr2 ." description Connection to Incapsula
// address-family ipv4 unicast
// neighbor ". $ipaddr2 ." activate
// neighbor ". $ipaddr2 ." $nama ".$ix."-exchange-Incapsula-in in
// neighbor ". $ipaddr2 ." maximum-prefix 20 restart 120\n
// #========== IPv6 Address ===========#\n
// neighbor ". $ipaddrv6 ." remote-as ". $as ."
// neighbor ". $ipaddrv6 ." peer-group ".$ix."-ix-peers-v6
// neighbor ". $ipaddrv6 ." description Connection to booking
// neighbor ". $ipaddrv6 ." activate
// neighbor ". $ipaddrv6 ." weight 1000
// neighbor ". $ipaddrv6 ." ". $nama ." ".$ix."-exchange-booking-in in";

// file_put_contents($file, $data) or die("Unable to open file!");


    mysqli_close($koneksi);
    // Redirect to;
    header('location:../list.php');
?>