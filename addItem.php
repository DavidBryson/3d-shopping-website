<?php
	include "connection.php";
	$Name = $_POST["Name"];
	$Desc = $_POST["Desc"];
	$Price = $_POST["Price"];
	$Stock = $_POST["Stock"];
	$Hidden = $_POST["Hidden"];
	$has3DModel = $_POST["has3DModel"];
	$date = date('y-m-d');
	$insert = "INSERT INTO items (Name, Description, Price, Stock, Hidden, has3DModel, DateAdded)
		VALUES('$Name','$Desc','$Price','$Stock','$Hidden','$has3DModel','$date')";
	if(!mysqli_query($con, $insert)){
		die('Error:' . mysqli_error($con));
	}

	$ID = mysqli_insert_id($con);
	echo $ID;

	//davidwalsh.name?basic-php-file-handling-create-open-read-write-append-close-delete
?>