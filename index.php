<!DOCTYPE html>
<html>
<head>
	<title>MySQL Table Viewer App Service</title>
</head>
<body>
	<h1>MySQL Table Viewer App Service</h1>
	<?php
		// Define database connection variables
		$servername = "mysql-azure-project.mysql.database.azure.com";
		$username = "mysqluser";
		$password = "Welcome@123";
		$dbname = "mydatabase";

		// Create database connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Query database for all rows in the table
		$sql = "SELECT * FROM mytable";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// Display table headers
			echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
			// Loop through results and display each row in the table
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}

		// Close database connection
		$conn->close();
	?>
</body>
</html>
