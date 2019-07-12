<?php
include("connect.php");
doDB();
session_start();

if ($_SESSION['type'] != "admin" or !isset($_GET["client"]) or !isset($_GET["employee"])) {
	if (!isset($_POST["client"])) {
			header("Location: index.html");
	}
}
if (isset($_GET["client"])) {
	$client = $_GET["client"];
	$emp = $_GET["employee"];
}
 ?>



 <?php
	if (isset($_POST["employee"])) {
		$client = $_POST["client"];
		$emp = $_POST["employee"];
		$update_sql = "
		UPDATE client_emp
		SET Basic = ".$_POST['basic'].", HRA = ".$_POST["hra"].", Allowances = ".$_POST["allowances"].", Conveyance = ".$_POST["conveyance"].", pf_deduction = ".$_POST["pf_deduction"]."
		WHERE client = '".$client."' and employee = '".$emp."' ";
		$update = mysqli_query($con, $update_sql) or die(mysqli_error($con));

		echo "Employee ".$_POST["employee"]." details uploaded successfully";
	}
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Edit Salary</title>
		<link rel="stylesheet" href="edit_emp.css">
	</head>
	<body>
		<h1>Edit Salary Here</h1>
		<form action="edit_emp.php" method="post"><p>
		 <label>Enter Basic: </label><input type="text" name="basic"  autocomplete="off"> <br></p><p>
		 <label>Enter HRA: </label><input type="text" name="hra"  autocomplete="off"> <br></p><p>
		 <label>Enter Allowances: </label><input type="text" name="allowances"  autocomplete="off"> <br></p><p>
		 <label>Enter Conveyance: </label><input type="text" name="conveyance"  autocomplete="off"> <br></p><p>
			 <label>Select PF Deduction:</label> <select name=\"pf_deduction\">
		       <option value=\"1\">No Deduction</option>
		       <option value=\"2\">Deduction on 1500</option>
		       <option value=\"3\">Deduction on actual</option>
		       </select><br><p><p>
		       <br>
		 <input type="hidden" name="employee" value="<?php echo $emp; ?>">
		 <input type="hidden" name="client" value="<?php echo $client; ?>">
		 <input type="submit" value="Update" class="ADD">
		</form>
	<div class="btn">
		<a href="client_emp.php?client=<?php echo $client ?>">Go Back</a>
	</div>
	</body>
</html>
