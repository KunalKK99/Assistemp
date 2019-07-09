<?php
include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id'])  or $_SESSION['type'] != "Employee") {
	header("Location: index.html");
	exit();
}

else {
	$employee_sql = "SELECT name from emp_details where employee = ".$_SESSION['id'];
  $employee = mysqli_query($con, $employee_sql) or die(mysqli_error($con));

	while ($a = mysqli_fetch_array($employee)) {
		$name = $a['name'];
	}
  echo "<div style=\"color:black; font-family: Arial; font-size:20px;\">Welcome ".$name."</div>";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal</title>
		<link rel="stylesheet" href="Employee.css">
  	<link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
			<img src="logo.png"  class="ii" alt="My Logo">
       <a href="logout.php">	<button class="button2">Logout</button></a>
      <h1>
        Assistemp Employee Portal
      </h1>

			<form action="file.php" method="get">
				<label>Enter Year: </label><input type="text" name="year" autocomplete="off"> <br><br>
				<label>Enter Month: </label><select name="month"> <br><br>
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
		        <option value="December">December</option><br><br>
					</select>
					<div class="btn">
						<br><br><input type="submit" name="" class="button" value="search">
					</div>
			</form>
  </body>
</html>
