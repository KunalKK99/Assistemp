<?php
include("connect.php");
doDB();
session_start();

if ($_SESSION['type'] != "admin" or !isset($_GET["client"])) {
  if(!isset($_POST["client"])){
	header("Location: index.html");
  	exit();
  }
}

if(isset($_GET["client"])){
$client = $_GET["client"];}

if (isset($_POST["client"])){

  $employee_sql = "
  INSERT INTO client_emp
  VALUES (".$_POST["client"].", ".$_POST["employee"].", ".$_POST["basic"].", ".$_POST["hra"].", ".$_POST["allowances"].", ".$_POST["conveyance"].", 0);";
  $employee = mysqli_query($con, $employee_sql) or die(mysqli_error($con));

  $date1 = strtotime($_POST["dob"]);
  $date1 = date('Y-m-d H:i:s', $date1);

  $date2 = strtotime($_POST["doj"]);
  $date2 = date('Y-m-d H:i:s', $date2);

  $emp_details_sql = "
  INSERT INTO emp_details
  VALUES (
    ".$_POST["employee"].", ".$_POST["client"].", '".$_POST["name"]."', '".$_POST["father"]."', '".$date1."', '".$date2."', ".$_POST["esi"].", "
    .$_POST["uan"].", ".$_POST["bac"].", ".$_POST["ifsc"].", ".$_POST["aadhar"]."
  );";

  $emp_details = mysqli_query($con, $emp_details_sql) or die(mysqli_error($con));



  echo "<br> Employee ".$_POST["employee"]." successfully added in Client".$_POST["client"]."<br>";
  $client = $_POST["client"];

}

$form = "
<form action=\"add_emp.php\" method=\"post\">
Enter Employee ID: <input type=\"text\" name=\"employee\"><br>
Enter Employee Name: <input type=\"text\" name=\"name\"><br>
Enter Fathers Name: <input type=\"text\" name=\"father\"><br>
Enter D.O.B: <input type=\"date\" name=\"dob\"><br>
Enter Date of Joining: <input type=\"date\" name=\"doj\"><br>
Enter ESI no: <input type=\"text\" name=\"esi\"><br>
Enter UAN: <input type=\"text\" name=\"uan\"><br>
Enter Bank A/C number: <input type=\"text\" name=\"bac\"><br>
Enter IFSC no: <input type=\"text\" name=\"ifsc\"><br>
Enter Aadhar no: <input type=\"text\" name=\"aadhar\"><br>
Enter Basic: <input type=\"text\" name=\"basic\"><br>
Enter HRA: <input type=\"text\" name=\"hra\"><br>
Enter Allowances: <input type=\"text\" name=\"allowances\"><br>
Enter Conveyance: <input type=\"text\" name=\"conveyance\"><br>

<input type=\"hidden\" name=\"client\" value=".$client.">
<input type=\"submit\" value=\"Add\">
</form>
";

echo "<br> Adding Employees in Client ".$client."<br><br><br>".$form;
echo "<a href=\"client_emp.php?client=".$client."\">Go Back</a>";

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title> Entry Details</title>
     <link rel="stylesheet" href="add_emp.css">
   </head>
   <body>
   </body>
 </html>
