<?php
include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id'])  or $_SESSION['type'] != "Employee") {
	header("Location: index.html");
	exit();
}

else {
  echo "<div style=\"color:black; font-family: Arial; font-size:20px;\">Welcome ".$_SESSION['id']."</div>";
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
       <a href="logout.php">	<button class="button2">Logout</button></a>
      <h1>
        Assistemp Employee Portal
      </h1>

			<form action="file.php" method="get">
				Enter Year: <input type="text" name="year"> <br><br>
				Enter Month: <select name="month"> <br><br>
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
				<br><br><input type="submit" name="" value="search">
			</form>

	
  </body>
</html>
