<?php
include('partials/db_connection.php');
$id = $_GET['id'];
$is_active = $_GET['is_active'];
$update1 = "UPDATE `add_sub_categories` SET is_active=$is_active WHERE sub_cat_id=$id";
mysqli_query($conn,$update1);
header('location:addsubcategory.php');
?>