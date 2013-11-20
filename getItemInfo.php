<?php
	include 'connection.php';
	$ID = $_GET["ID"];
	$raw_results = mysqli_query($con, "SELECT * FROM items WHERE ID=$ID") or die(mysql_error());
	$row = mysqli_fetch_array($raw_results);
	echo "
		<h2>$row[Name]</h2>
		<p>$row[Description]</p>
		<p class='price'>£$row[Price]</p>
		";
?>