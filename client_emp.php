<?php
include("connect.php");
doDB();
session_start();

if ($_SESSION['type'] != "admin") {
	header("Location: index.html");
	exit();
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
	<title>Client Manage</title>
	<link rel="stylesheet" href="client_emp.css">
 </head>
	 <body>
			<form action="client_emp.php" method="get">
				<div class="in">
					Enter Client ID: <input type="text" name="client" autocomplete="off"><br><br>
				</div>
				<div class="kk">
					<input type="submit" value="Search">
				</div>
			</form>
	<div class="go"><a href="admin.php">Go Back</a>
</div>
	 </body>
 </html>
 <?php
 if (isset($_GET["client"])) {
  $display = "
  <table cellpadding = \"3\" cellspacing = \"1\" border = \"1\" align=\"center\" width=\"50%\">
  <tr>
  <th> Employee ID </th>
  <th> Delete </th>
  <th> Edit </th>
  </tr>
  ";


  $employee_sql = "SELECT * from client_emp where client = ".$_GET['client']." ORDER BY employee";
  $employee = mysqli_query($con, $employee_sql) or die(mysqli_error($con));

	$name_sql = "
	SELECT name from emp_details where E
	";
  while($emp = mysqli_fetch_array($employee)) {
      $empl = $emp["employee"];
			$name_sql = "
			SELECT name from emp_details where employee = ".$empl.";
			";
			$name = mysqli_query($con, $name_sql) or die(mysqli_error($con));

      while($n = mysqli_fetch_array($name)){
				$nm = $n["name"];
			}

      $display .= "
      <tr>
      <td>".$empl."<br>".$nm."</td>
      <td><a href = \"delete_emp.php?client=".$_GET["client"]."&employee=".$empl."\">Delete</a></td>
      <td><a href = \"edit_emp.php?client=".$_GET["client"]."&employee=".$empl."\">Edit</a></td>
      </tr>
      ";
 }
 echo "<br><div style=\"color:black; font-family: Arial;   border:1px solid black;
   padding: 10px;
	 width:500px;
   border-radius: 10px;
	 margin-left:450px;
	 font-size:26px;text-align:center;\"> Showing Employees of Client ".$_GET["client"]."</div>";
 echo $display;

echo "<div class=\"oyo\">";
 echo "<br><div class=\"Add\"><a href=\"add_emp.php?client=".$_GET["client"]."\">Add Employees</div></a>";

 echo "<br><div class=\"for\"><a href=\"format1.php?client=".$_GET["client"]."&first=first"."\">Format 1</div></a>";
 }
echo "</div>";

  ?>
