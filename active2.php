<?php
include('partials/db_connection.php');
$id = $_GET['id'];
$status = $_GET['status'];
$update1 = "UPDATE `add_products` SET status=$status WHERE product_id=$id";
mysqli_query($conn,$update1);
header('location:addproduct.php');
?>