<?php

include 'DatabaseConfig.php';

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

if($_SERVER['REQUEST_METHOD']=='POST'){

    $Email = $_POST['user_email'];
    $Password = $_POST['user_password'];
    
    $Sql_Query = "SELECT * FROM volley WHERE user_email = '$Email' and user_password = '$Password' ";

    $check = mysqli_fetch_array(mysqli_query($con,$Sql_Query));

    if(isset($check)){

        echo "Data Matched";
    }else{
        echo "Invalid Username or Password!";
    }

mysqli_close($con);
}
?>