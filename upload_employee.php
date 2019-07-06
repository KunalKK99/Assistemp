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
    <title>Upload Employee Files </title>
		<link rel="stylesheet" href="upload_employee.css">
		<link href='https://fonts.googleapis.com/css?family=Allerta Stencil' rel='stylesheet'>
  </head>
  	<body>
			<h1> Upload Employee Files</h1>  <br>
    <form action="upload.php" method="post" enctype="multipart/form-data">
		<div class="sec">
			Month: <select name="month">
        <option value="January">January</option>
        <option value="February">February</option>
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
		</div>
		<br>
		<div class="yee">
			Year: <input type="text" name="year"required placeholder="Year"> <br><br>
		</div>
		 <hr>
		 <div class="Emp_id">
			 Employee ID: <input type="text" name="Employee_ID_1" placeholder="ID" > <br>
			 <input type="file" name="pdf_1" id="pdf_1">
			 <hr>
			 Employee ID: <input type="text" name="Employee_ID_2" placeholder="ID"> <br>
			 <input type="file" name="pdf_2" id="pdf_2">
			 <hr>
			 Employee ID: <input type="text" name="Employee_ID_3" placeholder="ID"> <br>
			 <input type="file" name="pdf_3" id="pdf_3">
			 <hr>
			 Employee ID: <input type="text" name="Employee_ID_4" placeholder="ID"> <br>
			 <input type="file" name="pdf_4" id="pdf_4">
			 <hr>
			 Employee ID: <input type="text" name="Employee_ID_5" placeholder="ID"> <br>
			 <input type="file" name="pdf_5" id="pdf_5">
			 <hr>
			 Employee ID: <input type="text" name="Employee_ID_6" placeholder="ID"> <br>
			 <input type="file" name="pdf_6" id="pdf_6">
			 <hr>
			 Employee ID: <input type="text" name="Employee_ID_7" placeholder="ID"> <br>
			 <input type="file" name="pdf_7" id="pdf_7">
			 <hr>
			 Employee ID: <input type="text" name="Employee_ID_8" placeholder="ID"> <br>
			 <input type="file" name="pdf_8" id="pdf_8">
			 <hr>
			 Employee ID: <input type="text" name="Employee_ID_9" placeholder="ID"> <br>
			 <input type="file" name="pdf_9" id="pdf_9">
			 <hr>
			 Employee ID: <input type="text" name="Employee_ID_10" placeholder="ID"> <br>
			 <input type="file" name="pdf_10" id="pdf_10">
				<hr>
	      <br>  <br >
		 </div>
		 	<div class="ff">
      <input type="hidden" name="upload" value="employee"> <br><br></div>
      <!--<input type="submit" value="Upload"> -->
			<button class="button" type="submit" value="Upload"><span>Upload</span></button>
    </form>
		<a href="admin.php">	<button class="button1">Back</button></a>
	<a href="logout.php">	<button class="button2">Logout</button></a>

  </body>
</html>
