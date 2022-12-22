<?php 
    include 'partials/db_connection.php';
    $id=$_GET['id'];
    $sql2 = "SELECT * FROM `categories` WHERE cat_id =$id";
$result2 = mysqli_query($conn, $sql2);               

$data = mysqli_fetch_assoc($result2);
$name=$data['cat_name'];
$is_active=$data['is_active'];
// echo $is_active;
// echo $name;
    if(isset($_POST['submit']))
    {
        $status=1;
        if(!isset($_POST['status'])){
            $status=0;
        }else{

       $status=1;
    }  
        
       
        
        $cat_name=$_POST['cat_name'];
        $sql="UPDATE `categories` SET cat_id=$id,cat_name='$cat_name', is_active=$status WHERE cat_id=$id";
        $result=mysqli_query($conn,$sql);
        if($result){
                echo "<script>alert('category updated successfully')</script>";
                ?>

	<meta http-equiv = "refresh" content = "0; url=http://localhost/akstest2/add_category.php" />


	<?php 
                echo '<a href="add_category.php" class="btn btn-info">Add Category</a>';

            
        }else{
            die(mysqli_error($conn));
        }
        //another query
    
   
//another query

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

    <title>update_category</title>
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
    
    
    
    <div>
        <form  method="POST" >
        <div class="form-outline w-50 m-auto mb-4">
        <h1>Update_Category</h1>
        </div>
        <br>
        <div class="form-outline w-50 m-auto mb-4">

			<label>Category_name</label>
			<input type="text" class="input" value="<?php echo $name; ?> " name="cat_name" required>
		</div>
        <br>
		
        <div class="form-outline w-50 m-auto mb-4">

        <label style="margin-left: 5px;">Active</label>&nbsp;&nbsp;&nbsp;<input type="checkbox"  name="status" value="1"
        
        <?php 
			if($data['is_active'] == "1")
            {
                echo "checked";
            }
			?>>
            </div>
            <br>

            <div class="form-outline w-50 m-auto mb-4">

			<input type="submit" value="update category" class="btn btn-primary" name="submit">
		</div>
        
        </form>
    </div>
    <div class="container-fluid bg-dark text-light mt-5">
    
    <p class="text-center py-3 mb-0">Copyright AksTest Coding Forums 2022 | All rights reserved</p>
</div>

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