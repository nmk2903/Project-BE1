<?php
session_start();
require "./config.php";
require "./models/db.php";
require "./models/product.php";
require "./models/manufacture.php";
if (isset($_SESSION['cart'])) {
    $product = new Product;
    $products = $product->getAllProducts();
    $date = date("Y-m-d");
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $zip_code = $_POST['zip-code'];
    $note = $_POST['note'];
    $tel = $_POST['tel'];
    $order_id  = $product->insertOrder($date, $first_name, $address, $tel, $note, $email, $zip_code);

    // foreach ($products as $key => $valueproduct) :
    //     foreach ($_SESSION['cart'] as $key => $value) :
    //         if ($valueproduct['id'] == $key) :
    //             $product->insertOrderDetails($key, 2, $valueproduct['price'], $value);


    //         endif;
    //     endforeach;
    // endforeach;
    //unset($_SESSION['cart']);
} 

header("location:index.php");