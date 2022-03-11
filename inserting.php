<!DOCTYPE html>
<html lang="en">
<head>
<title> Inserting information </title>
</head>
<body>
<center>
<?php
include 'db_connection.php';
$conn = OpenCon();
	$ID2 = $Student_Address = $Student_Affiliation = $gradyear = "";
	$IDErr2 = $Student_AddressErr = $Student_AffiliationErr = $gradyearErr ="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["ID2"])) {
	$IDErr2 = " ID should be entered ";
	}
	else {
	$ID2 =mysqli_real_escape_string($conn,$_POST["ID2"]);
	}
	if (empty($_POST["StudentAddress"])) {
$Student_AddressErr = " Student Address should be entered ";
	}
	else {
	$Student_Address =mysqli_real_escape_string($conn,$_POST["StudentAddress"]);

	}
	if (empty($_POST["StudentAffiliation"])) {
	$Student_AffiliationErr = " Student Affiliation should be entered ";
	}
	else {
	$Student_Affiliation =mysqli_real_escape_string($conn,$_POST["StudentAffiliation"]);

	}
	if (empty($_POST["gradyear"])) {
	$gradyearErr = " Graduation year should be entered ";
	}
	else {
	$gradyear =mysqli_real_escape_string($conn,$_POST["gradyear"]);
	}
	}
?>
	<h1>Inserting a new student into the database</h1>

		<form id="form2" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
			
<p>
				<label for="ID2">Student ID:</label>
				<input type="number" name="ID2" value="<?php echo $ID2;?>">
				<span class="error">* <?php echo $IDErr2;?></span>
				<br><br>
				<label for="StudentAddress">Student Address:</label>
				<input type="text" name="StudentAddress" value="<?php echo $Student_Address;?>">
				<span class="error">* <?php echo $Student_AddressErr;?></span>
				<br><br>
				<label for="StudentAffiliation">Student Affiliation:</label>
				<input type="text" name="StudentAffiliation" value="<?php echo $Student_Affiliation;?>">
				<span class="error">* <?php echo $Student_AffiliationErr;?></span>
				<br><br>
				<label for="ID">Student Graduation year:</label>
				<input type="number" name="gradyear" value="<?php echo $gradyear;?>">
				<span class="error">* <?php echo $gradyearErr;?></span>
				<br><br>
			</p>
			
			<input type="submit" name ="submit" value="submit">
		</form>
		<?php

$sql = "INSERT INTO student  VALUES ('$ID2', 
            '$Student_Address','$Student_Affiliation','$gradyear')";
            if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
            echo nl2br("\n$ID2\n $Student_Address\n "
                . "$Student_Affiliation\n $gradyear");
                } else{
            echo "ERROR: All field are required and should be filled";
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
		</center>
		</body>
		</html>
