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
		<img src="logo.png" alt="My Logo">
		
      <a href="logout.php">	<button class="button2">Logout</button></a>
      <h1>
        Assistemp Client Portal
      </h1>

			<form action="client.php" method="get">
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

<?php
if(isset($_GET["month"]) and isset($_GET["year"])){

$display = "
<div class=\"up\">
<div class=\"ff\">PF1 : <a href='file.php?year=".$_GET["year"]."&month=".$_GET["month"]."&sample=Sample1'>Download</a></div>
<br>
<div class=\"ff\">PF2 : <a href='file.php?year=".$_GET["year"]."&month=".$_GET["month"]."&sample=Sample2'>Download</a></div>
<br>
<div class=\"ff\">ESI : <a href='file.php?year=".$_GET["year"]."&month=".$_GET["month"]."&sample=Sample3'>Download</a></div></div>
";

echo $display;

}
 ?>
