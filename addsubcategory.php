<?php
include 'partials/db_connection.php';

if(isset($_POST['add_sub_category'])){
    $cat_name=$_POST['cat_name'];
    $sub_cat_name=$_POST['sub_cat_name'];
    $status   = $_POST['status'];
    
    

    //checking empty condition
    if($cat_name=='' or $sub_cat_name==''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }else{
        //insert query
        $insert_sub_category = "INSERT INTO `add_sub_categories` (`cat_id`,`sub_cat_name`,`is_active`) VALUES ('$cat_name','$sub_cat_name','$status')";
        $result_query=mysqli_query($conn,$insert_sub_category);
        if($result_query){
            echo "<script>alert('Successfully inserted')</script>";
            
        }
    }
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

    <title>Add sub category</title>
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


 
  <div class="container mt-3">
        <h1 class="text-center">Insert Sub Category</h1>
        <br><br>
        <form action="" method="POST">
          <?php
          // echo $cat_name;
          ?>
        
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="cat_name" id="" class="form-select w-100 m-auto">
                    <option value="<?php echo $cat_name ?>">Select Category</option>
                    <?php 
                $select_query = "SELECT * FROM `categories` where is_active=1";
                $result_query = mysqli_query($conn,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $cat_name=$row['cat_name'];
                    $cat_id=$row['cat_id'];
                    echo "<option value='$cat_id'>$cat_name</option>";
                }

                ?>
                    

                </select>
                <br><br> 
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="sub_cat_name" class="form-label">Sub_Category_Name</label>
            <input type="text" name="sub_cat_name" id="sub_cat_name" class="form-control"
             placeholder="Enter Sub_Category_Name" autocomplete="off" required>
             </div>
             <div class="clear">&nbsp;</div>
             <div class="form-outline mb-4 w-50 m-auto">
        </div>
             
             <div class="form-outline mb-4 w-50 m-auto">
        <label style="margin-left: 5px;">Status</label>&nbsp;&nbsp;&nbsp;<input type="checkbox"  name="status" value="1" required>
        </div>
        </div>
             <div class="form-outline mb-4 w-50 mb-3 px-3 m-auto">
                <input type="submit" name="add_sub_category" class="btn btn-info" value="add_category">
             </div>
 
        </form>
    </div>

    <br><br><br><br>
    
<!-- Here we start fetching -->


	<div class="container mt-3">
        <h1 class="text-center">Displaying Sub_Category Data</h1>

        </div>
    

	<table border="3" cellspacing="7" width="100%">
    <thead>
		<tr>
		<th width="20%">SUB_CATEGORY_ID</th>
		<th width="20%">Category Name</th>
		<th width="20%">sub Category Name</th>
		<th width="20%">Action</th>

        <th width="20%">Operation</th>
        
		
	</tr>
</thead>
<tbody>
  <?php
    $view = mysqli_query($conn,"SELECT * FROM `add_sub_categories`");
    while($result = mysqli_fetch_assoc($view)){
      $id = $result['sub_cat_id'];
      $cat_id = $result['cat_id'];

      $sub_cat_name = $result['sub_cat_name'];
      $is_active = $result['is_active'];

      $data1= mysqli_query($conn,"SELECT * FROM `categories` where cat_id='$cat_id'");

      $result1 = mysqli_fetch_assoc($data1);
      $cat_name=$result1['cat_name'];
      echo $cat_name;

      ?>
      <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $cat_name; ?></td>
        <td><?php echo $sub_cat_name; ?></td>
        <td>
      <?php
      if($result['is_active']==1)
      {
        echo "<P><a href='active1.php?id= $id & is_active=0 ' class='btn btn-success'>Active</a></p>";
      
        
      }
      else{
        echo "<P><a href='active1.php?id= $id & is_active=1 ' class='btn btn-danger'>Deactive</a></p>";


      }
      ?>
    </td>

        <td>
		<a href="updatesubcategory.php?id=<?php echo $id; ?>" class="btn btn-info"><input type = 'submit' value = 'Update' class ='update'></a>
		<a href="delete_sub_category.php?id=<?php echo $id; ?>" class="btn btn-danger"><input type = 'submit' value = 'Delete' class ='delete' onclick = 'return checkdelete()'></a>
		
     
    </td>
      </tr>
      <?php  } ?>

       
        
        
        
</tbody>


<script>
	function checkdelete() 
	{
		return confirm('Are you sure to delete this record ?');
	}
</script>



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