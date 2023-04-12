<?php
session_start();
include("./coonnection.php");
 $email = mysqli_real_escape_string($conn,$_POST['loge']);
 $password = mysqli_real_escape_string($conn,$_POST['logp']);
 $sql = " SELECT * FROM `login` WHERE `user_email` = $email AND `user_password` = $password";
 $run = mysqli_query($conn,$sql);
 if(mysqli_num_rows($run) != 0){
   $_SESSION["email"] = $email;
    echo 1;
 }else{
    echo 2;
 }
?>