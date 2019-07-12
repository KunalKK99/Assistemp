<?php
include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id'])  or $_SESSION['type'] != "admin") {
	header("Location: index.html");
	exit();
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload Client File</title>
		<link rel="stylesheet" href="upload_client.css">
		<link href='https://fonts.googleapis.com/css?family=Allerta Stencil' rel='stylesheet'>
  </head>
  <body>
		<h1> Upload Client Files</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
			  <div class="Client_id">
      Client ID: <input type="text" name="Client_Id" required autocomplete="off"> <br></div>
			<div class="sec">
	     Month: <select name="month">
        <option value="January">January</option>
        <option value="Febuary">Febuary</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
      </select>
		</div><br>
			<div class="yee">
			Year: <input type="text" name="year"required placeholder="Year"> <br><br>
		</div>
				<br>
					<div class="Emp_id">
				PF 1 : <input type="file" name="pdf1" id="pdf1"> <br> <br>
				PF 2 : <input type="file" name="pdf2" id="pdf2"> <br> <br>
				ESI : <input type="file" name="pdf3" id="pdf3"> <br> <br>
			<br>
			</div>
			<div class="ff">
      <!--<input type="submit" value="Upload"> -->
      <input type="hidden" name="upload" value="client"> <br><br></div>
			<button class="button" type="submit" value="Upload"><span>Upload</span></button>

    </form>
		<a href="admin.php">	<button class="button1">Back</button></a>
	<a href="logout.php">	<button class="button2">Logout</button></a>
  </body>
</html>
