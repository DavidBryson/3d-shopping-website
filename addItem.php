<?php
	include "connection.php";
	$Name = $_POST["Name"];
	$Desc = $_POST["Desc"];
	$Price = $_POST["Price"];
	$Stock = $_POST["Stock"];
	$Hidden = $_POST["Hidden"];
	$has3DModel = $_POST["has3DModel"];
	$date = date("y-m-d");
	$insert = "INSERT INTO items (Name, Description, Price, Stock, Hidden, has3DModel, DateAdded)
		VALUES('$Name','$Desc','$Price','$Stock','$Hidden','$has3DModel','$date')";
	if(!mysqli_query($con, $insert)){
		die("Error:" . mysqli_error($con));
	}else{

		$ID = mysqli_insert_id($con);
		echo "<p>$ID</p>";

		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["userfile"]["name"]);
		$extension = end($temp);

		if ((($extension == "gif")
		|| ($extension == "jpeg")
		|| ($extension == "jpg")
		|| ($extension == "pjpeg")
		|| ($extension == "x-png")
		|| ($extension == "png"))
		&& ($_FILES["userfile"]["size"] < 3000000)){

			$uploaddir = "itemData/";
			//$uploadfile = $uploaddir . basename($_FILES["userfile"]["name"]);
			if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $uploaddir . $ID . "." . $extension)) {
			    echo "Image is valid, and was successfully uploaded.\n";
			} else {
			    echo "error: " . $_FILES["userfile"]["error"] . "\n";
			    print_r($_FILES);
			}
		}else{
			echo "file type incorrect\n";
		}

		$my_file = "items/$ID.html";
		$handle = fopen($my_file, "w") or die("Cannot open file: " . $my_file);

		fwrite($handle, "<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>$ID - $Name</title>
        <link rel='stylesheet' type='text/css' href='../css/all.css'>
        <link rel='stylesheet' type='text/css' href='../css/item.css'>
        <script data-main='../js/item.main.js' src='../js/lib/require.js'></script>

    </head>
	<body>
		<div class='topBar'>
			<div class='searchWrapper'>
				<ul class='topMenu'>
					<li><a href='#'>Checkout</a></li>
					<li><a href='#'>Cart</a></li>
				</ul>
				<form action='' class='searchForm'>
					<input type='text' name='query' class='search' placeholder='Search...'>
				</form>
			</div>
		</div>
		<header>
			<img src='../img/logo.png' class='logo' alt='logo.png'>
			<nav>
				<li><a href='#'>Home</a></li>
				<li><a href='#'>Browse</a></li>
				<li><a href='#'>About</a></li>
				<li><a href='#'>Contact</a></li>
			</nav>
		</header>
		<section class='mainBody'>
			<div id='description'>
				<h2>$Name</h2>
				<p>$Desc</p>
				<p class='price'>£$Price</p>
			</div>
			<div class='item_Pic'>
				<img src='../itemData/$ID.$extension' alt=''>
				<div id='has3D'></div>
			</div>
		</section>
		<footer>
		</footer>
	</body>
</html>");

		fclose($handle);

		echo "<p>Item page created.</p>
		<p>Link to item page: <a href='items/$ID.html'>Here</a></p>";
	}
?>