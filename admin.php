<?php
include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id']) or $_SESSION['type'] != "admin") {
	header("Location: index.html");
	exit();
}
echo "<div style=\"color:black; font-family: Arial; font-size:22px;\">Welcome ".$_SESSION['id']."</div>";
//echo "Hello ".$_SESSION['id'];
$form = "
<form action='upload_employee.php' method='post'>
<div class=\"asd\">
<div class=\"kk\"><input type='submit' value='Upload for Employee'></div>
</form>

<form action='upload_client.php' method='post'>
<div class=\"k\"><input type='submit' value='Upload for Client'> </div>
</div>
</form>

<form action='client_emp.php' method='post'>
<div class=\"KU\"><input type='submit' value='Manage Clients and Employees'> </div>
</div>
</form>
";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Client Portal</title>
		<link href='https://fonts.googleapis.com/css?family=Allerta Stencil' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
		<link rel="stylesheet" href="admin.css">
	</head>
<h1> Upload your files here </h1>
	<?php
	echo $form;
	 ?>
	 <div class="kk">
	 <a href="logout.php">	<button class="button">Logout</button></a> </div>
</body>
</html>
