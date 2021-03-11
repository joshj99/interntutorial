<?php
	include 'connect.php';
	session_start();
?>

<html>

	<head>
		<link rel="stylesheet" href="styles.css">
		<title>Home</title>
	</head>
	
	<body >

		<h1>Home</h1>

		<div style="width: 100%; ">
	
			<div style="width: 50%; height: absolute; float: left;"> 
				<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by No or Name...">
			</div>
		
			<div style="margin-left: 50%; height: absolute; text-align: right;"> 
				<a class="right" href=createform.html  style="background-color:#009900;">Create New Product</a>
			</div>
		</div>

		<table id="myTable" border='1'>

			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Price(RM)</th>
				<th>Details</th>
				<th>Publish</th>
				<th>Action</th>
			</tr>

			<?php
				$sql = "SELECT * FROM data ORDER BY no";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<tr>" 
						. "<td>" . $row["no"] . "</td>" 
						. "<td>" . $row["name"] . "</td>" 
						. "<td>" . $row["price"] . "</td>" 
						. "<td>" . $row["details"] . "</td>" 
						. "<td>" . $row["publish"] . "</td>" 
						. "<td> <a href=show.php?id=". $row["no"] ." style=\"background-color:#3399ff;\">Show</a>
							<a href=editform.php?id=". $row["no"] .">Edit</a>
							<a href=delete.php?id=". $row["no"] ." style=\"background-color:#ff0000;\">Delete</a></td>" 
						. "</tr>";
					}
				} else {
				}
			?>

		</table>

		<script>
			function myFunction() {
				// Declare variables
				var input, filter, table, tr, td, i, txtValue;
				input = document.getElementById("myInput");
				filter = input.value.toUpperCase();
				table = document.getElementById("myTable");
				tr = table.getElementsByTagName("tr");

				// Loop through all table rows, and hide those who don't match the search query
				for (i = 0; i < tr.length; i++) {
					td = tr[i].getElementsByTagName("td")[0];
					td1 = tr[i].getElementsByTagName("td")[1];
					if ((td) || (td1)) {
						txtValue = td.textContent || td.innerText;
						txtValue1 = td1.textContent || td1.innerText;
						if  ( (txtValue.toUpperCase().indexOf(filter) > -1) || (txtValue1.toUpperCase().indexOf(filter) > -1) ) {
							tr[i].style.display = "";
						} else {
							tr[i].style.display = "none";
						}
					}
				}
			}
			
		</script>
		
	</body>
	
</html>

<?php
	$conn->close();
?>