<?php
include 'partials/db_connection.php';
if(isset($_GET['id'])){
    $edit_product=$_GET['id'];
    // echo $edit_product;
    $get_data="SELECT * FROM `add_products` where product_id=$edit_product";
    $result=mysqli_query($conn,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_id=$row['product_id'];
    $cat_id=$row['cat_id'];
    $sub_cat_id=$row['sub_cat_id'];
    $product_name=$row['product_name'];
    $product_image=$row['product_image'];
    
    $short_description=$row['short_description'];
    $title=$row['title'];
    $heading=$row['heading'];
    $description=$row['description'];
    $features=$row['features'];
    $pdfheading=$row['pdfheading'];
    $pdf=$row['pdf'];

    // echo $product_name;

    //fetching category name
    $select_category ="SELECT * FROM `categories` WHERE cat_id='$cat_id'";
    $result_category=mysqli_query($conn,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $cat_name=$row_category['cat_name'];
    // echo $cat_name;

    //fetching sub category name
    $select_sub_category ="SELECT * FROM `add_sub_categories` WHERE sub_cat_id='$sub_cat_id'";
    $result_sub_category=mysqli_query($conn,$select_sub_category);
    $row_sub_category=mysqli_fetch_assoc($result_sub_category);
    $sub_cat_name=$row_sub_category['sub_cat_name'];
    // echo $sub_cat_name;

}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Update_Product</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/akstest2">asktest</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dashboard
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="add_category.php">Add Category</a>
    <a class="dropdown-item" href="addsubcategory.php">Add Sub Category</a>
    <a class="dropdown-item" href="addproduct.php">Add Product</a>
  </div>
</div>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link btn " href="/akstest2">Home <span class="sr-only">(current)</span></a>
      </li>

     
      <li class="nav-item">
        <a class="nav-link active btn btn-info" href="/akstest2/logout.php">Logout</a>
      </li>

      <li><img src="images/logo.png" class="ml-5 mr-auto"></li>
      
    </ul>
    
  </div>
</nav>
<br>
<br>
<div class="form-outline mb-4 w-100 m-auto">
  <h1 class="text-center"><mark>Update Product</mark></h1>
</div>
<br>
<br>
    <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        
    <div class="form-outline">
            <div class="form-outline mb-4 w-100 m-auto">
                <select name="cat_name" id="" class="form-select w-100 m-auto">
                    <option value="<?php echo $cat_id ?>"><?php echo $cat_name ?></option>
                   
                    
                </select>
                <br><br> 
            </div>
            <div class="form-outline">
            <div class="form-outline mb-4 w-100 m-auto">
                <select name="sub_cat_name" id="" class="form-select w-100 m-auto">
                    <option value="<?php echo $sub_cat_id ?>"><?php echo $sub_cat_name ?></option>
                    
                    
                </select>
                <br><br> 
            </div>

  <div class="form-group">

    <label for="exampleInputEmail1">Product Name</label>
    <input type="text" class="form-control" value="<?php echo $product_name ?>" id="product_name" name="product_name" >

  </div>
  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_image" class="form-label">Product_Image</label>
    <div class="d-flex">
        <input type="file" id="product_image" name="product_image" class="form-control" required>
        <img src="<?php echo $product_image ?>" style="width: 100px; object-fit:contain" alt="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Short Description</label>
    <textarea class="form-control" value="" id="short_description" name="short_description" rows="3">
    <?php echo $short_description ?>
    </textarea>
  </div>
  <div class="form-group">
    <label for="">Description</label>
    <table id="employee_table" align=center>
   <tr id="row1">
    <td><input type="text" value="<?php echo $title ?>" name="title" placeholder="Title"></td>
    <td><input type="text" value="<?php echo $heading ?>" name="heading" placeholder="Heading"></td>
    <td><input type="text" value="<?php echo $description ?>" name="description" placeholder="Description"></td>
   </tr>
  </table>
  
    </div>

    <div class="form-group">
    <label for="exampleFormControlTextarea1">Features</label>
    <textarea class="form-control" value="" id="features" name="features" rows="5">
    <?php echo $features ?>
    </textarea>
  </div>

  <div class="form-group">
    <label for="">PDF Description</label>
    <table id="product_pdf" align=center>
   <tr id="rowpdf1">
    <td><input type="text" value="<?php echo $pdfheading ?>" name="pdfheading" placeholder="PDF Heading"></td>
    
   </tr>
  </table>
  
    </div>
    <div class="form-outline w-100 m-auto mb-4">
    <label for="product_image" class="form-label">PDF</label>
    <div class="d-flex">
        <input type="file" id="pdf" name="pdf" class="form-control" required>
        <embed src="<?php echo $pdf ?>" type="application/pdf" width="200px" height="150px">
        
    </div>
  </div>

  <br>
		
    <div class="form-outline w-100 m-auto mb-4">

    <label style="margin-left: 5px;">Active</label>&nbsp;&nbsp;&nbsp;<input type="checkbox"  name="status" value="1"
    
    <?php 
  if($row['status'] == "1")
        {
            echo "checked";
        }
  ?>>
        </div>
        <br><br>
   
  
        <div class="form-outline w-50 m-auto mb-4">
  <input type="submit" value="update Product" class="btn btn-primary" name="updateproduct">
  </div>

</form>
   
<br>
<br><br><br>
        
    </div>
    <div class="container-fluid bg-dark text-light mt-5">
    
    <p class="text-center py-3 mb-0">Copyright AksTest Coding Forums 2022 | All rights reserved</p>
</div>

    <?php
        if(isset($_POST['updateproduct'])){


        $filename = $_FILES["product_image"]["name"];
        $tempname = $_FILES["product_image"]["tmp_name"];
        $folder = "image/".$filename;
        $filename2 = $_FILES["pdf"]["name"];
        $tempname2 = $_FILES["pdf"]["tmp_name"];
        $folder2 = "images2/".$filename2;

        $status=1;
        if(!isset($_POST['status'])){
            $status=0;
        }else{

       $status=1;
    }  


        $cat_id=$_POST['cat_name'];
        $sub_cat_id=$_POST['sub_cat_name'];
        $product_name=$_POST['product_name'];
        $short_description=$_POST['short_description'];
        $title=$_POST['title'];
        $heading=$_POST['heading'];
        $description=$_POST['description'];
        $features=$_POST['features'];
        $pdfheading=$_POST['pdfheading'];

        if($product_name=='')
        {
            echo "<script>alert('please fill all the fields')</script>";
        }else{
            move_uploaded_file($tempname, $folder);
            move_uploaded_file($tempname2, $folder2);

            //query to update product
            $update_products="UPDATE `add_products` SET cat_id='$cat_id',sub_cat_id='$sub_cat_id',
            product_name='$product_name',product_image='$folder',short_description='$short_description',
            title='$title',heading='$heading',description='$description',features='$features',
            pdfheading='$pdfheading',pdf='$pdf',status='$status' WHERE product_id=$edit_product ";

            $result_update=mysqli_query($conn,$update_products);
            if($result_update){
            echo "<script>alert('Result updated')</script>";
            ?>
	<meta http-equiv = "refresh" content = "0; url=http://localhost/akstest2/addproduct.php" />

            <?php

            }
    

        }

        }
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>