<?php
include "partials/db_connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Product Page</title>
<link href="form_style.css" type="text/css" rel="stylesheet"/>


<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


<link href="menu/quickmenu0.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="menu/quickmenu0.js"></script>
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
<header>
  <div id="wrap">
    <div class="logo"><img src="images/logo.png" border="0"></div>
    <div class="topmenu">
      <ul>
        <li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
        <li><a href="change_password.php">Change Password</a> |</li>
        <li><a href="logout.php"><img src="images/logout.png" width="16" height="16" border="0" align="absmiddle">&nbsp;&nbsp;Logout</a></li>
      </ul>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</header>
<nav>
  <ul id="qm0" class="qmmc">
    <li><a href="admin.php">Dashboard</a></li>
      
<li><a href="#" class="qmactive">Product</a>
          <ul>
            <li><a href="add_category.php">Add Category</a></li>
            <li><a href="add_sub_category.php">Add  Sub Category</a></li>
            
            <li><a href="product.html">Add Product</a></li>
          </ul>
      </li>    
    </ul>
</nav>
<div id="wrap">
  <div class="clear" style="height:5px;"></div>
  <div id="wrap2">
    <h1>Add Product</h1>
    <br>
    <div class="container">
    <form action="/akstest2/product.php" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
        <label >Select Category</label>
        <select name="cat_name" required>
				<!-- <option value="not_selected">Select</option> -->
				<option value="">Select Categories</option>
                <?php 
                $select_query = "SELECT * FROM `sub_categories`";
                $result_query = mysqli_query($conn,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $category_title=$row['cat_name'];
                    $category_id=$row['cat_id'];
                    echo "<option value='$category_title'>$category_title</option>";
                }
                ?>

				
				

			</select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1"> Select Sub Category</label>
    <select name="sub_cat_name" required>
				<!-- <option value="not_selected">Select</option> -->
				<option value="">Select Sub Categories</option>
                <?php 
                $select_query = "SELECT * FROM `sub_categories`";
                $result_query = mysqli_query($conn,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $category_title=$row['sub_cat_name'];
                    $category_id=$row['cat_id'];
                    echo "<option value='$category_title'>$category_title</option>";
                }
                ?>

				
				

			</select>
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
  <input type="submit" name="submit_row" value="SUBMIT">
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
  <input type="submit" name="submit_row" value="SUBMIT">
    </div>
   
  
  <div class="form-group">
  <input type="submit" value="Add Product" class="btn btn-primary" name="addproduct">
  </div>
</form>
        
    </div>
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
   $cat_name= $_POST['cat_name'];
   $sub_cat_name= $_POST['sub_cat_name'];
   $product_name= $_POST['product_name'];
   
   $short_description = $_POST["short_description"];
   $title   = $_POST['title'];
   $heading   = $_POST['heading'];
   $description = $_POST["description"];


            
   $features = $_POST["features"];
   $pdfheading = $_POST["pdfheading"];

   
  

   $sql = "INSERT INTO `products` (`cat_name`,`sub_cat_name`,`product_name`,`product_image`,`short_description`,`title`,`heading`,`description`,`features`,`pdfheading`,`pdf`)
   VALUES('$cat_name','$sub_cat_name','$product_name','$folder','$short_description','$title','$heading','$description','$features','$pdfheading','$folder2')";
   $result = mysqli_query($conn,$sql);
   
   if($result){
       echo "Add category successfully !";

   }else
   {
    echo "Error".mysqli_connect_error();
   }
}


    ?>

     <!-- Here we start fetching -->
<?php 


$query = "SELECT * FROM `products` ";
$data = mysqli_query($conn, $query);      

$total = mysqli_num_rows($data);          

$result = mysqli_fetch_assoc($data);       


if($total != 0) 
{
    

	?>

	<h2 align="center"><mark>Display Product Data</mark></h2>
    

	<center><table border="3" cellspacing="7" width="100%"></center>
		<tr>
		<th width="5%">ID</th>
		<th width="7%">Category Name</th>
        <th width="7%">Sub Category Name</th>
		<th width="7%">Products</th>
		<th width="7%">Product_Image</th>
		<th width="7%">Short_Description</th>
		<th width="5%">Heading</th>
		<th width="5%">Title</th>
		<th width="5%">Description</th>

		<th width="7%">Features</th>
        <th width="7%">Pdf Heading</th>
        <th width="7%">Pdf</th>

		
        <th width="10">Operation</th>
		
	</tr>

	<?php
  
  while($result = mysqli_fetch_assoc($data))
  {
  		
  			
       echo "<tr>
    <td>".$result['product_id']."</td>
		<td>".$result['cat_name']."</td>
		<td>".$result['sub_cat_name']."</td>
		<td>".$result['product_name']."</td>
		<td>".$result['product_image']."</td>
        

		<td>".$result['short_description']."</td>
		<td>".$result['heading']."</td>
		<td>".$result['title']."</td>
		<td>".$result['description']."</td>

		<td>".$result['features']."</td>
		<td>".$result['pdfheading']."</td>
		<td>".$result['pdf']."</td>

		
		

        <td>
		<a href='update_product.php?id=$result[product_id]'><input type = 'submit' value = 'Update' class ='update'></a>
		<a href='delete_product.php?id=$result[product_id]'><input type = 'submit' value = 'Delete' class ='delete' onclick = 'return checkdelete()'></a>
		</td>
	</tr>
	";
 
    }
}
else
{
  echo "No records found";
}
?>
<!-- Here we end fetching data -->
<script>
	function checkdelete() 
	{
		return confirm('Are you sure to delete this record ?');
	}
</script>

    
   
    

  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>