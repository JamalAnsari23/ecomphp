<?php 
    error_reporting(0);
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="akstest";

    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if($conn){
        // echo "mysqli_connect successfully";

    }else{
        echo "mysqli_connect unsuccessful".mysqli_connect_error();
    }
?>