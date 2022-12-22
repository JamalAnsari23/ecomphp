<?php include'partials/db_connection.php'
    
?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Add Product</title>
    <script type="text/javascript">
function add_row()
{
 $rowno=$("#employee_table tr").length;
 $rowno=$rowno+1;
 $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='title[]' placeholder='Title'></td><td><input type='text' name='heading[]' placeholder='Heading'></td><td><input type='text' name='description[]' placeholder='Description'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
<script type="text/javascript">
function add_pdf()
{
 $rownox=$("#product_pdf tr").length;
 $rownox=$rownox+1;
 $("#product_pdf tr:last").after("<tr id='rowpdf"+$rownox+"'><td><input type='text' name='pdfheading[]' placeholder='PDF Heading'></td></td><td><input type='file' name='pdf[]' placeholder='PDF'></td><td><input type='button' value='Deletepdf' onclick=delete_rowx('rowpdf"+$rownox+"')></td></tr>");
}
function delete_rowx(rowno)
{
 $('#'+rowno).remove();
}
</script>
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


<div class="container mt-7">
    <div class="text-center">
        <h1>Add product</h1>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        
    <div class="form-outline mb-4 w-100 m-auto">
                <select name="cat_name" id="" class="form-select w-100 m-auto">
                    <option value="">Select Category</option>
                    <?php 
                $select_query = "SELECT * FROM `categories` WHERE is_active=1";
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
            <div class="form-outline mb-4 w-100 m-auto">
                <select name="sub_cat_name" id="" class="form-select w-100 m-auto">
                    <option value="">Select sub Category</option>
                    <?php 
                $select_query = "SELECT * FROM `add_sub_categories` where is_active=1 && cat_id='$catid'";
                $result_query = mysqli_query($conn,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $sub_cat_name=$row['sub_cat_name'];
                    $sub_cat_id=$row['sub_cat_id'];
                    echo "<option value='$sub_cat_id'>$sub_cat_name</option>";
                }
                ?>
                    

                </select>
                <br><br> 
            </div>

  <div class="form-group">

    <label for="exampleInputEmail1">Product Name</label>
    <input type="text" class="form-control" id="product_name" name="product_name" >

  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Product Image 1</label>
    <input type="file" class="form-control-file" id="product_image" name="product_image">
    <small id="emailHelp" class="form-text text-muted">Image Size ( Width=560px, Height=390px ) (Product page)</small>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Short Description</label>
    <textarea class="form-control" id="short_description" name="short_description" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="">Description</label>
    <table id="employee_table" align=center>
   <tr id="row1">
    <td><input type="text" name="title" placeholder="Title"></td>
    <td><input type="text" name="heading" placeholder="Heading"></td>
    <td><input type="text" name="description" placeholder="Description"></td>
   </tr>
  </table>
  <input type="button" onclick="add_row();" value="ADD ROW">
  <!-- <input type="submit" name="submit_row" value="SUBMIT"> -->
    </div>

    <div class="form-group">
    <label for="exampleFormControlTextarea1">Features</label>
    <textarea class="form-control" id="features" name="features" rows="5"></textarea>
  </div>

  <div class="form-group">
    <label for="">PDF Description</label>
    <table id="product_pdf" align=center>
   <tr id="rowpdf1">
    <td><input type="text" name="pdfheading" placeholder="PDF Heading"></td>
    <td><input type="file" name="pdf" class="form-control-file" id="exampleFormControlFile1"></td>
   </tr>
  </table>
  <input type="button" onclick="add_pdf();" value="ADD ROW">
  <!-- <input type="submit" name="submit_row" value="SUBMIT"> -->
    </div>
    <div class="form-outline mb-4 w-100 m-auto">
    <label style="margin-left: 5px;">Status</label>&nbsp;&nbsp;&nbsp;<input type="checkbox"  name="status" value="1" required>
        </div>
   
  
  <div class="form-group">
  <input type="submit" value="Add Product" class="btn btn-primary" name="addproduct">
  </div>
  <div class="clear">&nbsp;</div>
  <div class="clear">&nbsp;</div>
         

</form>
<div class="container mt-3">
        <h1 class="text-center">Displaying PRODUCT Data</h1>

        </div>
    

	<table border="3" cellspacing="7" width="100%">
    <thead>
		<tr>
		<th width="5%">PRODUCT_ID</th>
		<th width="5%">Cat_Name</th>
		<th width="5%">Sub_Cat_Name</th>
		<th width="10%">Product Name</th>
		<th width="10%">Product Image</th>
		<th width="10%">Short_Description</th>
		<th width="10%">Title</th>
		<th width="10%">Heading </th>
		<th width="10%">Description </th>

		<th width="10%">Features </th>

		<th width="10%">PDF Heading</th>
		<th width="10%">PDF</th>

        <th width="15%">Operation</th>
        <th width="5%">Action</th>
		
	</tr>
</thead>
<tbody>
  <?php
    $view = mysqli_query($conn,"SELECT * FROM `add_products`");
    while($result = mysqli_fetch_assoc($view)){
      $id = $result['product_id'];
      $cat_id = $result['cat_id'];
      $sub_cat_id=$result['sub_cat_id'];
      $product_name = $result['product_name'];
      $product_image = $result['product_image'];
      $short_description = $result['short_description'];
      $title = $result['title'];
      $heading = $result['heading'];
      $description = $result['description'];
      $features = $result['features'];
      $pdfheading=$result['pdfheading'];
      $pdf=$result['pdf'];

      $data1= mysqli_query($conn,"SELECT * FROM `categories` where cat_id='$cat_id'");

      $result1 = mysqli_fetch_assoc($data1);
      $cat_name=$result1['cat_name'];
      $data2= mysqli_query($conn,"SELECT * FROM `add_sub_categories` where sub_cat_id='$cat_id'");

      $result2 = mysqli_fetch_assoc($data2);
      $sub_cat_name=$result2['sub_cat_name'];



      ?>
      <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $cat_name; ?></td>
        <td><?php echo $sub_cat_name; ?></td>
        <td><?php echo $product_name; ?></td>
        <td><?php echo "<img src='$product_image' style='width: 100px; object-fit:contain'"; ?></td>
        <td><?php echo $short_description; ?></td>
        <td><?php echo $title; ?></td>
        <td><?php echo $heading; ?></td>
        <td><?php echo $description ?></td>
        <td><?php echo $features; ?></td>
        <td><?php echo $pdfheading; ?></td>
        <td><?php echo "<embed src='$pdf' type='application/pdf' width='150px' height='150px' " ?></td>

        






        <td>
		<a href="update_product.php?id=<?php echo $id; ?>" class="btn btn-info"><input type = 'submit' value = 'Update' class ='update'></a>
		<a href="delete_product.php?id=<?php echo $id; ?>" class="btn btn-danger"><input type = 'submit' value = 'Delete' class ='delete' onclick = 'return checkdelete()'></a>
		</td>
    <td>
      <?php
      if($result['status']==1)
      {
        echo "<P><a href='active2.php?id= $id & status=0' class='btn btn-success'>Active</a></p>";
      
        
      }
      else{
        echo "<P><a href='active2.php?id= $id & status=1 ' class='btn btn-danger'>Deactive</a></p>";


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


<?php
    if(isset($_POST['addproduct']))
    {
        $filename = $_FILES["product_image"]["name"];
        $tempname = $_FILES["product_image"]["tmp_name"];
        $folder = "image/".$filename;
        move_uploaded_file($tempname, $folder);
        $filename2 = $_FILES["pdf"]["name"];
        $tempname2 = $_FILES["pdf"]["tmp_name"];
        $folder2 = "images2/".$filename2;
        move_uploaded_file($tempname2, $folder2);


        $cat_id=$_POST['cat_name'];
        $sub_cat_id=$_POST['sub_cat_name'];
        $product_name=$_POST['product_name'];
        

        $short_description=$_POST['short_description'];
        $title=$_POST['title'];
        $heading=$_POST['heading'];
        $description=$_POST['description'];
        $features=$_POST['features'];
        $pdfheading=$_POST['pdfheading'];
       
        $status   = $_POST['status'];
        
        
        if($cat_id==''){
            echo "<script>alert('please fill all fields')</script>";
            exit();
        }else{
            
            move_uploaded_file($product_image_tmp,"./image/$product_image");
            move_uploaded_file($pdf_temp,"./images2/$pdf");
            $insert_products="INSERT INTO `add_products` (`cat_id`,`sub_cat_id`,`product_name`,`product_image`,`short_description`,`title`,`heading`,
            `description`,`features`,`pdfheading`,`pdf`,`status`)
             VALUES('$cat_id','$sub_cat_id','$product_name','$folder','$short_description','$title','$heading','$description','$features','$pdfheading','$folder2','$status')";
             $result_query=mysqli_query($conn,$insert_products);
             if($result_query){
                echo "<script>alert('inserted successfully')</script>";
                ?>
	<meta http-equiv = "refresh" content = "0; url=http://localhost/akstest2/addproduct.php" />


                <?php

             }


        }
   
    }
?>
 
    

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>