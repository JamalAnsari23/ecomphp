<?php
include('partials/db_connection.php');
$id = $_GET['id'];
$is_active = $_GET['is_active'];
$update1 = "UPDATE `categories` SET is_active=$is_active WHERE cat_id=$id";
mysqli_query($conn,$update1);
header('location:add_category.php');
?>