<?php
include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id'])) {
	header("Location:Employee.php");
	exit();
}


$display_block = "

<table cellpadding = \"3\" cellspacing = \"1\" border = \"1\" align=\"center\" width=\"50%\">
<tr>
<th>Months</th>
<th>PDF</th>
<th>Download</th>
</tr>";




?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Quiz Results</title>
		<link rel="stylesheet" href="Res.css">
		<link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
		  </head>
<body>
	<div class="kunal">
		<h1 align="center"></h1>
			<?php echo $display_block; ?>

  </body>
</html>
