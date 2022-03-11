<!DOCTYPE html>
<html lang="en">

<head>
	<title>GFG- Store Data</title>
</head>

<body>
	<center>
	
	<?php
	include 'db_connection.php';
	$conn = OpenCon();
	$ID="";
	$IDErr="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["ID"])) {
	$IDErr = " ID should be entered ";
	}
	else {
	$ID =mysqli_real_escape_string($conn,$_POST["ID"]);
	}
	}
	
?>
		<h1>Welcome</h1>

		<form id="form1" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
			
<p>
ENTER THE STUDENT ID YOU WANT TO DISPLAY IFROMATION FOR:<br><br>
				<label for="ID">Student ID:</label>
				<input type="text" name="ID" value="<?php echo $ID;?>">
				<span class="error">* <?php echo $IDErr;?></span>
				<br><br>
			</p>
			
			<input type="submit" name ="submit" value="submit">
		</form>
				<?php
		// Taking the ID value from the form (input)
		
		// Performing retrieve query execution
		$sql = "SELECT * FROM student WHERE id='$ID'";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . " ID: " . $row['id'] . "</td>" . " <br> ";
		echo "<td>" . " Address: " . $row['address'] . "</td>". " <br> ";
		echo "<td>" . " Affiliation: " . $row['affiliation'] . "</td>". " <br> ";
		echo "<td>" . " Graduation Year: " . $row['gradyear'] . "</td>". " <br> ";
		echo "<br>";
		echo "</tr>";
		}
		mysqli_close($conn);
	?>
	<br><br>
	<form action = "inserting.php" method="POST">
	Click here if you want to add New Student to the database:<br>
	<input type="submit" name="submit" value="submit">
	</form>
	</center>
</body>

</html>

