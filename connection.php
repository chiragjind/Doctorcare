<?php

$username = "root";
$password = "";
$server = "localhost";
$db = "doctorcare";

$con=mysqli_connect($server,$username,$password,$db);

if($con){
    // echo "connection successfull";
}else{
    echo "error in connection to php";
    die('no connection'.mysqli_connect_error());
}
?>
