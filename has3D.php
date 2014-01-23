<?php
	include 'connection.php';
	$ID = $_GET["ID"];
	$raw_results = mysqli_query($con, "SELECT * FROM items WHERE ID=$ID") or die(mysql_error());
	$row = mysqli_fetch_array($raw_results);
	if($row['has3DModel'] == 'n'){
		echo '';
	}else{
		echo '<a href="../body.html">View Shirt in 3D!</a>';
	}
?>