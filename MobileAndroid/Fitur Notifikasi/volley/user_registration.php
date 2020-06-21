<?php
include 'DatabaseConfig.php';
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
    $Email = $_POST['user_email'];
    $Password = $_POST['user_password'];
    $Full_Name = $_POST['user_full_name'];
if($_SERVER['REQUEST_METHOD']=='POST'){
    $CheckSQL = "SELECT * FROM volley WHERE user_email='$Email'";
    $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
    if(isset($check)){
        echo 'Email Already Exist, Please Enter Another Email.';
    }
else{
    $Sql_Query = "INSERT INTO volley (user_email,user_password,user_full_name) values ('$Email','$Password','$Full_Name')";
    if(mysqli_query($con,$Sql_Query))
    {
        echo 'User Registration Successfully';
    }
else{
    echo 'Something Went Wrong';
}
}
}
mysqli_close($con);
?>