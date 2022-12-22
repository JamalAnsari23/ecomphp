<?php 

include('partials/db_connection.php');
$id= $_GET['id'];

$sql = "DELETE FROM categories WHERE cat_id='$id'";
if($conn->query($sql)==TRUE){
	echo"Record delete ";
}else{
	echo"Error delete records:".$conn->error;
}
$query=mysqli_query($conn,"SELECT * FROM categories");
$number=1;
while($row=mysqli_fetch_array($query)){
	$id=$row['cat_id'];
	$sql = "UPDATE categories SET cat_id=$number WHERE cat_id=$id";
	if($conn->query($sql)==TRUE){
		echo "REcord Reset Successfully<br>";
	}
	$number++;
}
$sql = "ALTER TABLE categories AUTO_INCREMENT=1";
if($conn->query($sql)==TRUE){
	echo "RECORD ALTER SUCCESS";
	?>

	<meta http-equiv = "refresh" content = "0; url=http://localhost/akstest2/add_category.php" />


	<?php 

}else{
	echo "ERROR ALETE TABLE: ".$conn->error;

}


?>

