<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $Full_Name = $_POST['nama_pem'];

 $Username	= $_POST['userpem'];

 $Password 	= $_POST['passpem'];

 $AlamatR	= $_POST['alamatpem'];

 $NoHp		= $_POST['nopem'];

 $Email 	= $_POST['emailpem'];
 
 $ktppem	= $_POST['nikpem'];

 

 

 $CheckSQL = "SELECT * FROM pemilik WHERE emailpem ='$Email'";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo 'Email Already Exist, Please Enter Another Email.';

 }
else
{ 

$Sql_Query = "INSERT INTO pemilik (nama_pem,userpem,passpem,alamatpem,nopem,emailpem,nikpem) values ('$Full_Name','$Username','$Password','$AlamatR','$NoHp','$Email','$ktppem')";

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