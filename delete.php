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
			$id = $_GET["id"];
			$sql2 = "SELECT * FROM data WHERE no = '$id'";
			$result2 = $conn->query($sql2);
			$sql = "DELETE FROM data WHERE no = '$id'";


			if ($conn->query($sql)){
				echo "<b>The following product is deleted:</b><br><br>";
				
					if ($result2->num_rows > 0) {
						while($row = $result2->fetch_assoc()) {
							echo "<b>No: </b>". $row["no"]. "<br><br>"
							. "<b>Name: </b>". $row["name"]. "<br><br>" 
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
		?>
		
		<a href=index.php>Back</a>
		
	</body>
</html>

<?php
	$conn->close();
?>