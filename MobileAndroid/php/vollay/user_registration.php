<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $Email = $_POST['emailpem'];
 
 $Password = $_POST['passpem'];
 
 $Full_Name = $_POST['nama_pem'];

 $alamatpem	= $_POST['alamatpem'];

 $nopem	= $_POST['nopem'];

 $userpem	= $_POST['userpem'];

 

 $CheckSQL = "SELECT * FROM pemilik WHERE emailpem='$Email'";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo 'Email Already Exist, Please Enter Another Email.';

 }
else{ 
$Sql_Query = "INSERT INTO pemilik (emailpem,passpem,nama_pem,userpem,alamatpem,nopem) values ('$Email','$Password','$Full_Name','$alamatpem','$nopem','$userpem')";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'User Registration Successfully';
}
else
{
 echo 'Something went wrong';
 }
 }
mysqli_close($con);
}
 
?>