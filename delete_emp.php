<?php
include("connect.php");
doDB();
session_start();

if ($_SESSION['type'] != "admin" or !isset($_GET["client"]) or !isset($_GET["employee"])) {
	header("Location: index.html");
	exit();
}

$employee_sql = "DELETE FROM client_emp WHERE client=".$_GET["client"]." and employee=".$_GET["employee"];
$employee = mysqli_query($con, $employee_sql) or die(mysqli_error($con));

$employee_details = "DELETE FROM emp_details WHERE client=".$_GET["client"]." and employee=".$_GET["employee"];
$employee = mysqli_query($con, $employee_details) or die(mysqli_error($con));

header("Location: client_emp.php?client=".$_GET["client"]);

 ?>
