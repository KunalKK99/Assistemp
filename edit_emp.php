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
		SET Basic = ".$_POST['basic'].", HRA = ".$_POST["hra"].", Allowances = ".$_POST["allowances"].", Conveyance = ".$_POST["conveyance"]."
		WHERE client = '".$client."' and employee = '".$emp."' ";
		$update = mysqli_query($con, $update_sql) or die(mysqli_error($con));

		echo "Employee ".$_POST["employee"]." details uploaded successfully";
	}
  ?>

 <form action="edit_emp.php" method="post">
 	Enter Basic: <input type="text" name="basic"> <br>
	Enter HRA: <input type="text" name="hra"> <br>
	Enter Allowances: <input type="text" name="allowances"> <br>
	Enter Conveyance: <input type="text" name="conveyance"> <br>
	<input type="hidden" name="employee" value="<?php echo $emp; ?>">
	<input type="hidden" name="client" value="<?php echo $client; ?>">
	<input type="submit" value="Update">
 </form>

 <a href="client_emp.php?client=<?php echo $client ?>">Go Back</a>
