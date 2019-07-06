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
      <table>
        <tr>
          <th>Month(Year)</th>
          <th>PDF</th>
        </tr>
        <tr>
          <td>Jan.(2019)</td>
          <td><a href="file.php?month=January">Download <i class="fas fa-arrow-circle-down"></i> </a></td>
        </tr>
        <tr>
          <td>Feb.(2019)</td>
          <td><a href="file.php?month=February">Download <i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>Mar.(2019)</td>
          <td><a href="file.php?month=March">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>Apr.(2019)</td>
          <td><a href="file.php?month=April">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>May(2019)</td>
          <td><a href="file.php?month=May">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>June(2019)</td>
          <td><a href="file.php?month=June">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>July(2019)</td>
          <td><a href="file.php?month=July">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>Aug.(2019)</td>
          <td><a href="file.php?month=August">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>Sept.(2019)</td>
          <td><a href="file.php?month=September">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>Oct.(2019)</td>
          <td><a href="file.php?month=October">Download<i class="fas fa-arrow-circle-down"></i>
</a></td>
        </tr>
        <tr>
          <td>Nov.(2019)</td>
          <td><a href="file.php?month=November">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>Dec.(2019)</td>
          <td><a href="file.php?month=December">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
      </table>
			<div class="kk">
<a href="#"><button class="button1">Next &raquo;</button></a></div>
  </body>
</html>
