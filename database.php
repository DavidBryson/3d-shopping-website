<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Database Page</title>
        <script type="text/javascript">
        	addItem = function () {
        		
        	}
        </script>
    </head>
	<body>
		<form action="addItem.php" method="post">
			<label for="Name">Name: <input type="text" name="Name" id="Name"></label>
			<label for="Desc">Description: <input type="text" name="Desc" id="Desc"></label>
			<label for="Price">Price: <input type="Number" name="Price" id="Price" step="0.01" min="0"></label>
			<label for="Stock">Stock: <input type="Number" name="Stock" id="Stock" step="1" min="0"></label>
			<label for="Hidden">Hidden: <select name="Hidden" id="Hidden">
					<option value='n'>No</option>
					<option value='y'>Yes</option>
				</select>
			</label>
			<label for="has3DModel">has3DModel: <select name="has3DModel" id="has3DModel">
					<option value='n'>No</option>
					<option value='y'>Yes</option>
				</select>
			</label>
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