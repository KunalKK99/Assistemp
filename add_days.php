<?php
include("connect.php");
doDB();
session_start();

if (!isset($_POST)) {
	header("Location: index.html");
	exit();
}

$client = $_POST['client'];
$update_sql = "
UPDATE client_emp
SET No_of_days_worked = ".$_POST['nodw']."
WHERE client = '".$client."' and employee = '".$_POST['emp']."' ";
$update = mysqli_query($con, $update_sql) or die(mysqli_error($con));

header("Location: format1.php?client=$client");
 ?>
