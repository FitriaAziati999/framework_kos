<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);



    $Email = $_POST['emailpem'];
    $Password = $_POST['passpem'];
    
    $Sql_Query = "SELECT * FROM pemilik WHERE emailpem = '$Email' and passpem = '$Password'";

    $check = mysqli_fetch_array(mysqli_query($con,$Sql_Query));

    if(isset($check)){

        echo "Data Matched";
    }else{
        echo "Invalid Email or Password!";
    }

mysqli_close($con);
}
?>