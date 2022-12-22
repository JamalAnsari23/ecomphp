<?php 

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){

	header("location: login.php");
	exit;
}


?>
<?php 
include "partials/db_connection.php";
?>
<?php 
         if($_POST['addcategory'])
         {
            $category = $_POST['cat_name'];
            $status   = $_POST['status'];
           	
            
            $sql = "INSERT INTO `categories` (`cat_name`,`is_active`) VALUES('$category','$status')";
            $result = mysqli_query($conn,$sql);
            
            if($result){
                echo "<script>alert('category inserted successfully')</script>";
    
            }
         }
            ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Add Category PAge</title>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<style>
    table
		{
			background: white;
		}
</style>


<link href="menu/quickmenu0.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="menu/quickmenu0.js"></script>

</head>
<body>
<header>
  <div id="wrap">
       <div class="logo"><img src="images/logo.png" border="0"></div>
    <div class="topmenu">
      <ul>
        <li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
        <li><a href="change_password.php">Change Password</a>&nbsp;|</li>
        <li><a href="logout.php"><img src="images/logout.png" width="16" height="16" border="0" align="absmiddle">&nbsp;&nbsp;Logout</a></li>
      </ul>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</header>
  <nav>
    <ul id="qm0" class="qmmc" >
      <li><a href="admin.php">Dashboard</a></li>
      <li><a href="#">Product</a>
          <ul>
            <li><a href="add_category.php">Add Category</a></li>
            <li><a href="addsubcategory.php">Add  Sub Category</a></li>
            <li><a href="addproduct.php">Add Product</a></li>
          </ul>
      </li>    
    
    </ul>
  </nav>
  
<div id="wrap">
  <div class="clear" style="height:5px;"></div>
  <div id="wrap2">
    
    <h1>Add Category</h1>
    <br>

    <div>
        <form action="/akstest2/add_category.php" method="POST" enctype="multipart/form-data">
        <div class="input_field">
			<label>Category_name</label>
			<input type="text" class="input" name="cat_name" required>
		</div>
<br>
		

		
        <div class="clear">&nbsp;</div>
        <label style="margin-left: 5px;">Status</label>&nbsp;&nbsp;&nbsp;<input type="checkbox"  name="status" value="1" required>

        
        
        <div class="input_field">
			<input type="submit" value="Add category" class="btn" name="addcategory">
		</div>
        </form>
    </div>
    
    
  <div class="clear">&nbsp;</div>
</div>

<!-- Here we start fetching -->


	<h2 align="center"><mark>Display Category Data</mark></h2>
    

	<center><table border="3" cellspacing="7" width="100%">
    <thead>
		<tr>
		<th width="20%">ID</th>
		<th width="20%">Category Name</th>
		
        <th width="20%">Operation</th>
        <th width="20%">Action</th>
		
	</tr>
</thead>
<tbody>
  <?php
    $view = mysqli_query($conn,"SELECT * FROM `categories`");
    while($result = mysqli_fetch_assoc($view)){
      $id = $result['cat_id'];
      $cat_name = $result['cat_name'];
      ?>
      <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $cat_name; ?></td>
        <td>
		<a href="update_category2.php?id=<?php echo $id; ?>" class="btn btn-info"><input type = 'submit' value = 'Update' class ='update'></a>
		<a href="delete_category.php?id=<?php echo $id; ?>" class="btn btn-danger"><input type = 'submit' value = 'Delete' class ='delete' onclick = 'return checkdelete()'></a>
		</td>
    <td>
      <?php
      if($result['is_active']==1)
      {
        echo "<P><a href='active.php?id= $id & is_active=0 ' class='btn btn-success'>Active</a></p>";
      
        
      }
      else{
        echo "<P><a href='active.php?id= $id & is_active=1 ' class='btn btn-danger'>Deactive</a></p>";


      }
      ?>
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


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>