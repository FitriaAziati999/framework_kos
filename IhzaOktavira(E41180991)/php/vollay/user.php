<?php

include 'DatabaseConfig.php';
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

$Id = $_POST['id_pemilik'];

$sql = "SELECT * FROM pemilik WHERE id_pemilik='$Id'";

$r = mysqli_query($con,$sql);

$result = array();
$row = mysqli_fetch_array($r);
array_push($result,array(
    "Id"=>$row['id_pemilik'],
    "Nama"=>$row['nama_pem'],
    "Nomor"=>$row['nopem'],
    "Alamat"=>$row['alamatpem'],
    "Email"=>$row['emailpem'],
    "Username"=>$row['userpem']
));

echo json_encode(array('result=>$result'));
mysqli_close($con)

?>