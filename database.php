<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Database Page</title>
    </head>
	<body>
		<form enctype="multipart/form-data" action="addItem.php" method="post">
			<p><label for="Name">Name: </label><input type="text" name="Name" id="Name"></p>
			<p><label for="Desc">Description: </label><input type="text" name="Desc" id="Desc"></p>
			<p><label for="Price">Price: </label><input type="Number" name="Price" id="Price" step="0.01" min="0"></p>
			<p><label for="Stock">Stock: </label><input type="Number" name="Stock" id="Stock" step="1" min="0"></p>
			<p><label for="Hidden">Hidden: </label><select name="Hidden" id="Hidden">
					<option value='n'>No</option>
					<option value='y'>Yes</option>
				</select></p>
			<!-- MAX_FILE_SIZE must precede the file input field -->
    		<p>
			<label for="userfile">Upload Image File: </label><input type="hidden" name="MAX_FILE_SIZE" value="3000000"><input name="userfile" type="file"></p>
			<p><label for="has3DModel">has3DModel: </label><select name="has3DModel" id="has3DModel">
					<option value='n'>No</option>
					<option value='y'>Yes</option>
				</select></p>
			<input type="submit" value="Submit">
		</form>
		<?php
			include "connection.php";
			$raw_results = mysqli_query($con, "SELECT * FROM items");
			echo "
			<table>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Desc</th>
					<th>Price</th>
					<th>Hidden</th>
					<th>Date Added</th>
					<th>Stock</th>
					<th>has3DModel</th>
				</tr>
			";
			while ($row = mysqli_fetch_array($raw_results)) {
				echo "
					<tr>
						<td>$row[ID]</td>
						<td>$row[Name]</td>
						<td>$row[Description]</td>
						<td>$row[Price]</td>
						<td>$row[Hidden]</td>
						<td>$row[DateAdded]</td>
						<td>$row[Stock]</td>
						<td>$row[has3DModel]</td>
					</tr>
				";
			}
			echo "</table>";
		?>
	</body>
</html>