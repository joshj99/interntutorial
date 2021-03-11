<?php
	include 'connect.php';
	session_start();
?>

<html>
	<head>
		<link rel="stylesheet" href="styles.css">
	</head>
	<body>

		<?php

			if (isset($_POST['Edit'])){
				$id = $_POST['no'];
				$name = $_POST['name'];
				$price = $_POST['price'];
				$details = $_POST['details'];
				$publish = $_POST['publish'];
	
				$sql = "UPDATE data SET name = '$name', price = '$price', details = '$details', publish = '$publish' WHERE no = '$id'";
	
				if ($conn->query($sql)){
					echo "<b>Product Edited:</b><br><br>";
					$sql = "SELECT * FROM data WHERE no = '$id'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo "<b>Name: </b>". $row["name"]. "<br><br>" 
							. "<b>Price: </b>RM". $row["price"]. "<br><br>" 
							. "<b>Detail: </b>". $row["details"]. "<br><br>" 
							. "<b>Publish: </b>". $row["publish"]. "<br><br>";
						}
					} else {
						echo "0 results";
					}
				}
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}	
		?>
		
		<a href=index.php>Back</a>
		
	</body>
	
</html>

<?php
	$conn->close();
?>