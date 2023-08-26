<?php
session_start();
include 'connection.php';

if(isset($_SESSION['token'])){  // Corrected syntax here
    $token = $_GET['token'];  // Corrected syntax here
    $updatequery = "UPDATE `logindata` SET `status`='active' WHERE token='$token' ";
    $query = mysqli_query($con, $updatequery);
    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] = "Account update successfully";  // Corrected spelling here
            header('location: Signup.php');
        } else{
            $_SESSION['msg'] = "You are logout";  // Corrected spelling here
            header('location: Signup.php');
        }
    }
} else{
    $_SESSION['msg'] = "Account not update";  // Corrected spelling here
    header('location: Login.php');
}
?>
