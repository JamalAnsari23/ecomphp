<?php 

include('partials/db_connection.php');
$id= $_GET['id'];

$sql = "DELETE FROM `add_products` WHERE product_id='$id'";
if($conn->query($sql)==TRUE){
	echo"<script>alert('Record deleted')</script> ";
}else{
	echo"Error delete records:".$conn->error;
}
$query=mysqli_query($conn,"SELECT * FROM add_products");
$number=1;
while($row=mysqli_fetch_array($query)){
	$id=$row['product_id'];
	$sql = "UPDATE add_products SET product_id=$number WHERE product_id=$id";
	if($conn->query($sql)==TRUE){
		echo "REcord Reset Successfully<br>";
	}
	$number++;
}
$sql = "ALTER TABLE add_products AUTO_INCREMENT=1";
if($conn->query($sql)==TRUE){
	echo "RECORD ALTER SUCCESS";
	?>

	<meta http-equiv = "refresh" content = "0; url=http://localhost/akstest2/addproduct.php" />


	<?php 

}else{
	echo "ERROR ALETE TABLE: ".$conn->error;

}
?>