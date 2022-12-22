<?php
include 'partials/db_connection.php';
if(isset($_GET['id']))
{
    $edit_id=$_GET['id'];
    // echo $edit_id;
    $get_data="SELECT * FROM `add_sub_categories` WHERE sub_cat_id=$edit_id";
    $result=mysqli_query($conn,$get_data);
    $row=mysqli_fetch_assoc($result);
    $cat_id=$row['cat_id'];
    $sub_cat_name=$row['sub_cat_name'];
    // echo $sub_cat_name;

    //fetching category name
    $select_category ="SELECT * FROM `categories` WHERE cat_id='$cat_id'";
    $result_category=mysqli_query($conn,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $cat_name=$row_category['cat_name'];
    // echo $cat_name;
    

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

    <title>updatesubcategory</title>
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
    <div class="container mt-5">
        <h1 class="text-center">Edit Sub_Category</h1>
        <br><br><br><br>
        <form action="" method="POST">
            <div class="form-outline">
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="cat_name" id="" class="form-select w-100 m-auto">
                    <option class="selected"value="<?php echo $cat_id ?>"><?php echo $cat_name ?></option>
                </select>
                <br><br> 
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="sub_cat_name" class="form-label">Sub_Category_Name</label>
            <input type="text" value="<?php echo $sub_cat_name; ?>" name="sub_cat_name" id="sub_cat_name" class="form-control"
             placeholder="Enter Sub_Category_Name" autocomplete="off" required>
             </div>
             <br>
		
        <div class="form-outline w-50 m-auto mb-4">

        <label style="margin-left: 5px;">Active</label>&nbsp;&nbsp;&nbsp;<input type="checkbox"  name="status" value="1"
        
        <?php 
			if($row['is_active'] == "1")
            {
                echo "checked";
            }
			?>>
            </div>
             <br><br>
             <div class="form-outline mb-4 w-50 mb-3 px-3 m-auto">
                <input type="submit" name="edit_sub_category" class="btn btn-info" value="update_sub_category">
             </div>
        </form>
    </div>

    <br><br><br><br>
            </div>
        </form>
    </div>
    <br>
<br><br><br>
        
    </div>
    <div class="container-fluid bg-dark text-light mt-5">
    
    <p class="text-center py-3 mb-0">Copyright AksTest Coding Forums 2022 | All rights reserved</p>
</div>

    <?php
        if(isset($_POST['edit_sub_category']))
        {
            $status=1;
        if(!isset($_POST['status'])){
            $status=0;
        }else{

       $status=1;
    }  
            $cat_name=$_POST['cat_name'];
            $sub_cat_name=$_POST['sub_cat_name'];
            

            // checking for fields empty or not
            if($cat_name=='' or $sub_cat_name==''){
                echo "<script>alert('Please fill all the fields and then continue the process')</script>";
            }else{
                $update_sub_category="UPDATE `add_sub_categories` SET cat_id='$cat_name',sub_cat_name='$sub_cat_name',is_active='$status' WHERE sub_cat_id=$edit_id";
                $result_update=mysqli_query($conn,$update_sub_category);
                if($result_update){
                echo "<script>alert('sub category update successfully')</script>";
                ?>
	<meta http-equiv = "refresh" content = "0; url=http://localhost/akstest2/addsubcategory.php" />

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