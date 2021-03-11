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
			if (isset($_POST["name"])){
				$sql = "INSERT INTO data(name, price, details, publish)
				VALUES ('".$_POST["name"]."', '".$_POST["price"]."', '".$_POST["details"]."', '".$_POST["publish"]."')";
	
				if (mysqli_query($conn, $sql)) {
					echo "<b>Product Added Sucessfully</b><br><br>";
					$sql2 = "SELECT * FROM data  
							ORDER BY no DESC  
							LIMIT 1";

					$result2 = $conn->query($sql2);

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
					
				} else {
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