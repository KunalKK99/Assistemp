<?php
include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id'])  or $_SESSION['type'] != "Client") {
	header("Location: index.html");
	exit();
}

else {
  echo "<div style=\"color:black; font-family:Arial; font-size:20px;\">Welcome ".$_SESSION['id']."</div>";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		   	<link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
		 		<link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
    <title>Client Portal</title>
<link rel="stylesheet" href="Client.css">
  </head>
  <body>
      <a href="logout.php">	<button class="button2">Logout</button></a>
      <h1>
        Assistemp Client Portal
      </h1>
      <table>
        <tr>
          <th>Month(Year)</th>
          <th>PF</th>
          <th>ESI</th>
        </tr>
        <tr>
          <td>Jan.(2019)</td>
          <td><a href="file.php?month=January&sample=Sample1">Download<i class="fas fa-arrow-circle-down"></i></a>
              <a href="file.php?month=January&sample=Sample2">Download<i class="fas fa-arrow-circle-down"></i></a>
          </td>
          <td><a href="file.php?month=January&sample=Sample3">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>Feb.(2019)</td>
          <td><a href="file.php?month=Febuary&sample=Sample1">Download<i class="fas fa-arrow-circle-down"></i></a>
              <a href="file.php?month=Febuary&sample=Sample2">Download<i class="fas fa-arrow-circle-down"></i></a>
          </td>
          <td><a href="file.php?month=Febuary&sample=Sample3">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>March(2019)</td>
          <td><a href="file.php?month=March&sample=Sample1">Download<i class="fas fa-arrow-circle-down"></i></a>
              <a href="file.php?month=March&sample=Sample2">Download <i class="fas fa-arrow-circle-down"></i></a>
          </td>
          <td><a href="file.php?month=March&sample=Sample3">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>April(2019)</td>
          <td><a href="file.php?month=April&sample=Sample1">Download <i class="fas fa-arrow-circle-down"></i></a>
              <a href="file.php?month=April&sample=Sample2">Download <i class="fas fa-arrow-circle-down"></i></a>
          </td>
          <td><a href="file.php?month=April&sample=Sample3">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>May(2019)</td>
          <td><a href="file.php?month=May&sample=Sample1">Download<i class="fas fa-arrow-circle-down"></i></a>
              <a href="file.php?month=May&sample=Sample2">Download <i class="fas fa-arrow-circle-down"></i></a>
          </td>
          <td><a href="file.php?month=May&sample=Sample3">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>June(2019)</td>
          <td><a href="file.php?month=June&sample=Sample1">Download<i class="fas fa-arrow-circle-down"></i></a>
              <a href="file.php?month=June&sample=Sample2">Download<i class="fas fa-arrow-circle-down"></i></a>
          </td>
          <td><a href="file.php?month=June&sample=Sample3">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>July(2019)</td>
          <td><a href="file.php?month=July&sample=Sample1">Download<i class="fas fa-arrow-circle-down"></i></a>
              <a href="file.php?month=July&sample=Sample2">Download<i class="fas fa-arrow-circle-down"></i></a>
          </td>
          <td><a href="file.php?month=July&sample=Sample3">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>Aug.(2019)</td>
          <td><a href="file.php?month=August&sample=Sample1">Download<i class="fas fa-arrow-circle-down"></i></a>
              <a href="file.php?month=August&sample=Sample2">Download<i class="fas fa-arrow-circle-down"></i></a>
          </td>
          <td><a href="file.php?month=August&sample=Sample3">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>Sept.(2019)</td>
          <td><a href="file.php?month=September&sample=Sample1">Download<i class="fas fa-arrow-circle-down"></i></a>
              <a href="file.php?month=September&sample=Sample2">Download<i class="fas fa-arrow-circle-down"></i></a>
          </td>
          <td><a href="file.php?month=September&sample=Sample3">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>Oct.(2019)</td>
          <td><a href="file.php?month=October&sample=Sample1">Download<i class="fas fa-arrow-circle-down"></i></a>
              <a href="file.php?month=October&sample=Sample2">Download<i class="fas fa-arrow-circle-down"></i></a>
          </td>
          <td><a href="file.php?month=October&sample=Sample3">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>Nov.(2019)</td>
          <td><a href="file.php?month=November&sample=Sample1">Download<i class="fas fa-arrow-circle-down"></i></a>
              <a href="file.php?month=November&sample=Sample2">Download<i class="fas fa-arrow-circle-down"></i></a>
          </td>
          <td><a href="file.php?month=November&sample=Sample3">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
        <tr>
          <td>Dec.(2019)</td>
          <td><a href="file.php?month=December&sample=Sample1">Download<i class="fas fa-arrow-circle-down"></i></a>
              <a href="file.php?month=December&sample=Sample2">Download<i class="fas fa-arrow-circle-down"></i></a>
          </td>
          <td><a href="file.php?month=December&sample=Sample3">Download<i class="fas fa-arrow-circle-down"></i></a></td>
        </tr>
      </table>
			<div class="kk">
				<a href="#"><button class="button1">Next &raquo;</button></a>
			</div>
  </body>
</html>
