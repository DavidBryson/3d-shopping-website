<?php
	include "connection.php";
	$numberOfItems = $_GET["number"];
	$getItems = "SELECT * FROM  `items` ORDER BY ID LIMIT $numberOfItems";
	if(!mysqli_query($con, $getItems)){
		die('Error:' . mysqli_error($con));
	}else{
		$raw_results = mysqli_query($con, $getItems);
		echo "<ul class='mainThumbnails'>";
		while($row = mysqli_fetch_array($raw_results)) {
			echo "<li class='mainThumbnailsli'><a href='items/$row[ID].html'><img src='itemData/$row[ID].jpg'></a></li>";
		}
		echo "</ul>";
	}

?>