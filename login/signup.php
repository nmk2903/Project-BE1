<?php
session_start();
// insert database
//require "../models/db.php"; 
// require "register.php";

if (isset($_POST['submit'])) {   

    $connection =  mysqli_connect("localhost", "root", "", "nhom9", 3306);
    $username = $_POST['username'];
   

    $password = $_POST['password'];
   $password = md5($password);
    $role_id = $username == 'admin'? $role_id = +1:$role_id+2;    

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    echo $email;
    $id = null;
    echo $username;
    echo $id;  

    $stmt1 = $connection->prepare("INSERT INTO `users` (`user_id`, `username`,`password`, `role_id`, `email`, `phone`, `address`) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
    $stmt1->bind_param("sssssss", $id, $username, $password , $role_id,$email,$phone,$address);
    $stmt1->execute();
    $_SESSION['user_id'] = $id;
}
header("location:index.php");




// $sql = "INSERT INTO `sign_up`(`id`, `username`, `email`, `phone`,`address`,`password`) VALUES (null, '$username', '$email', '$phone','$address','$password')";
// $sql .= "INSERT INTO `users` (`user_id`, `username`,`password`,`role_id`) VALUES (10, '$username','$password1',10)";
// $connection->set_charset("utf8");
// mysqli_multi_query($connection,$sql);