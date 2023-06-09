<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $connection =  mysqli_connect("localhost", "root", "", "nhom9", 3306);
    $sql = $connection->prepare("DELETE FROM `products` WHERE `id` = $id");
    $sql->execute();
}
header("location:products.php")
?>