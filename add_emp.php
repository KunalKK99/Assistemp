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
  VALUES (NULL ,".$_POST["client"].", ".$_POST["employee"].", ".$_POST["basic"].", ".$_POST["hra"].", ".$_POST["allowances"].", ".$_POST["conveyance"].", 0, ".$_POST["pf_deduction"].");";
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
<form action=\"add_emp.php\" method=\"post\"><p>
<label>Enter Employee ID:</label> <input type=\"text\" name=\"employee\" autocomplete=\"off\"><br></p><p>
<label>Enter Employee Name: </label><input type=\"text\"name=\"name\"autocomplete=\"off\"><br></p><p>
<label>Enter Fathers Name:</label> <input type=\"text\" name=\"father\"autocomplete=\"off\"><br><p><p>
<label>Enter D.O.B:</label> <input type=\"date\" name=\"dob\"autocomplete=\"off\"><br></p><p>
<label>Enter Date of Joining:</label> <input type=\"date\"name=\"doj\"autocomplete=\"off\"><br><p><p>
<label>Enter ESI no: </label><input type=\"text\"name=\"esi\"autocomplete=\"off\"><br><p><p>
<label>Enter UAN: </label><input type=\"text\"name=\"uan\"autocomplete=\"off\"><br><p><p>
<label>Enter Bank A/C number: </label><input type=\"text\" name=\"bac\"autocomplete=\"off\"><br><p><p>
<label>Enter IFSC no: </label><input type=\"text\" name=\"ifsc\"autocomplete=\"off\"><br><p><p>
<label>Enter Aadhar no: </label><input type=\"text\" name=\"aadhar\"autocomplete=\"off\"><br><p><p>
<label>Enter Basic:</label> <input type=\"text\" name=\"basic\"autocomplete=\"off\"><br><p><p>
<label>Enter HRA: </label><input type=\"text\" name=\"hra\"autocomplete=\"off\"><br><p><p>
<label>Enter Allowances: </label><input type=\"text\" name=\"allowances\"autocomplete=\"off\"><br><p><p>
<label>Enter Conveyance: </label><input type=\"text\" name=\"conveyance\"autocomplete=\"off\"><br><p><p>

Select PF Deduction: <select name=\"pf_deduction\"> <br><br>
    <option value=\"1\">No Deduction</option>
    <option value=\"2\">Deduction on 1500</option>
    <option value=\"3\">Deduction on actual</option>
    <br><br>
    </select>
<br><br>
<input type=\"hidden\" name=\"client\" value=".$client.">
<input type=\"submit\" value=\"Add\" class=\"ADD  \">
</form>
";

echo "<br>Adding Employees in Client ".$client."<br><br><br>".$form;
echo "<div class=\" btn\"><a href=\"client_emp.php?client=".$client."\"   >Go Back</a>";
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
