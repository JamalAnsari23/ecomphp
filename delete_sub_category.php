<?php 

include('partials/db_connection.php');
$id= $_GET['id'];

$sql = "DELETE FROM add_sub_categories WHERE sub_cat_id='$id'";
if($conn->query($sql)==TRUE){
	echo"<script>alert('Record deleted')</script> ";
}else{
	echo"Error delete records:".$conn->error;
}
$query=mysqli_query($conn,"SELECT * FROM add_sub_categories");
$number=1;
while($row=mysqli_fetch_array($query)){
	$id=$row['sub_cat_id'];
	$sql = "UPDATE add_sub_categories SET sub_cat_id=$number WHERE sub_cat_id=$id";
	if($conn->query($sql)==TRUE){
		echo "REcord Reset Successfully<br>";
	}
	$number++;
}
$sql = "ALTER TABLE add_sub_categories AUTO_INCREMENT=1";
if($conn->query($sql)==TRUE){
	echo "RECORD ALTER SUCCESS";
	?>

	<meta http-equiv = "refresh" content = "0; url=http://localhost/akstest2/addsubcategory.php" />


	<?php 

}else{
	echo "ERROR ALETE TABLE: ".$conn->error;

}

?>