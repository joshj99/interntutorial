<?php
	include 'connect.php';
	session_start();
	$id = $_GET["id"];
	$sql = "SELECT * FROM data WHERE no = '$id'";
	$result = $conn->query($sql);
?>

<html>

	<head>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
		<div>
			
			<div class="left">
				<h1>Show Product</h1>
			</div>
			
			<div class="right">
				<a href=index.php>Back</a>
			</div>
			
		</div>
	
		<?php
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
		?>
		
	</body>
	
</html>

<?php
	$conn->close();
?>