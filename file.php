<?php
include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id'])) {
	header("Location: index.html");
	exit();
}

if($_SESSION['type'] == "Employee"){
if (!isset($_SESSION['id']) and !isset($_GET['month']) and !isset($_GET['year'])) {
	header("Location: index.html");
	exit();
}

header("Location: files/".$_SESSION['id']."/".$_GET['year']."/".$_GET['month']."/Salary_Slip.pdf");
}

else if($_SESSION['type'] == "Client"){
	if (!isset($_SESSION['id']) and !isset($_GET['month']) and !isset($_GET['sample'])) {
		header("Location: index.html");
		exit();
	}

	header("Location: files/".$_SESSION['id']."/".$_GET['year']."/".$_GET['month']."/".$_GET['sample'].".pdf");
}


?>
