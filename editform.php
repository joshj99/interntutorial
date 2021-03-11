<?php
	include 'connect.php';
	session_start();
?>

<html>

	<head>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
		<div>
			<h1>Edit Product</h1>
			<div class="right">
				<a href=index.php>Back</a>
			</div>
		</div>
		
	<?php
		$id = $_GET["id"];
		$sql = "SELECT * FROM data WHERE no = '$id'";
		$result = $conn->query($sql);
	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
	?>
			
			<form action="edit.php" method="POST" id=editform>
				<input type="hidden" name="no" value="<?php echo $row['no'] ?>" readonly><br>
				<b>Name:</b><br>
					<input type="text" name = "name" value="<?php echo $row['name'] ?>" ><br>
				<b>Price(RM):</b><br>
					<input type="text" name = "price" value="<?php echo $row['price'] ?>" ><br>
				<b>Details:</b><br>
					<textarea rows="5" cols="50" name="details"  form="editform" required><?php echo $row['details'] ?></textarea><br>
				<b>Publish:</b><br>
					<input type="radio" name="publish" <?php if($row['publish']=='Yes') echo "checked='true'" ?> value="Yes">
				<label for="Yes">Yes</label>
					<input type="radio" name="publish" <?php if($row['publish']=='No') echo "checked='true'" ?> value="No">
				<label for="No">No</label><br><br>

				<div class="center">
					<button type="submit" name="Edit" value="Edit">Submit</button>
				</div>
			</form>
			
	<?php		
			}
		} else {
			echo "0 results";
		}
	$conn->close();
	?>
	
	</body>
	
</html>