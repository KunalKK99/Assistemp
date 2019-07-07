<?php
include("connect.php");
doDB();
session_start();

if((!isset($_GET['client']) and !isset($_POST["client"])) or $_SESSION['type'] != "admin"){
	header("Location: index.html");
	exit();
}

if(isset($_GET['client'])){
	$client = $_GET['client'];
	$display = "
	<table cellpadding = \"3\" cellspacing = \"1\" border = \"1\" align=\"center\" width=\"50%\">
	<tr>
	<th>Name of Employee</th>
	<th>Basic</th>
	<th>HRA</th>
	<th>Allowances</th>
	<th>Conveyance</th>
	<th>No. of days worked</th>
	</tr>
	";
$employee_sql = "SELECT * from client_emp where client = ".$_GET['client']." ORDER BY employee";
$employee = mysqli_query($con, $employee_sql) or die(mysqli_error($con));

while($emp = mysqli_fetch_array($employee)) {
	  $nodw = $emp["No_of_days_worked"];
		$empl = $emp["employee"];
		$Basic = $emp["Basic"];
		$HRA = $emp["HRA"];
		$Allowances = $emp["Allowances"];
		$Conveyance = $emp["Conveyance"];
		$DaysWorked = 0;

    $display .="
    <tr>
			<td align=\"center\">
			".$empl."
			</td>
      <td align=\"center\">
      ".$Basic."
      </td>
      <td align=\"center\">
      ".$HRA."
      </td>
			<td align=\"center\">
      ".$Allowances."
      </td>
			<td align=\"center\">
      ".$Conveyance."
      </td>
			<td>
			".$nodw."
			<form action=add_days.php method=post>
      <input type=\"text\" name=\"nodw\" autocomplete=\"off\">
			<input type=\"hidden\" name=\"client\" value=".$_GET['client'].">
			<input type=\"hidden\" name=\"emp\" value=$empl>
			<input type=\"submit\" value=\"set\">
			</form>
			</td>
		</tr>
    ";
}

echo $display;
echo "
<form action=\"format1.php\" method=\"post\" >
<div class=\"mon\">
Month: <select name=\"month\" >
	<option value=\"31\">January</option>
	<option value=\"28\">Febuary</option>
	<option value=\"31\">March</option>
	<option value=\"30\">April</option>
	<option value=\"31\">May</option>
	<option value=\"30\">June</option>
	<option value=\"31\">July</option>
	<option value=\"31\">August</option>
	<option value=\"30\">September</option>
	<option value=\"31\">October</option>
	<option value=\"30\">November</option>
	<option value=\"31\">December</option>
</select>
<input type=\"hidden\" name=\"client\" value=".$_GET['client'].">
<input type=\"Submit\" value=\"Calculate\">
</div>
";


echo "<div class=\"go\"><a href=\"client_emp.php?client=".$_GET["client"]."\">Go Back</a>";
}


if(isset($_POST["client"])){
	$client = $_POST['client'];
  $month = $_POST["month"];
	$employee_sql = "SELECT * from client_emp where client = ".$_POST['client']." ORDER BY employee";
	$employee = mysqli_query($con, $employee_sql) or die(mysqli_error($con));
	$display = "
	<table cellpadding = \"3\" cellspacing = \"1\" border = \"1\" align=\"center\" width=\"50%\" class=\"tab\">
  <tr>
	<th>".$month."</th>
	<th></th>
	<th colspan=\"4\">Rate</th>
	<th></th>
	<th colspan=\"3\">Earnings</th>
	<th></th>
	<th colspan=\"2\">Deductions</th>
	</tr>
	<tr>
	<th>S.No</th>
	<th>Name of Employee</th>
	<th>Basic</th>
	<th>HRA</th>
	<th>Allowances</th>
	<th>Conveyance</th>
	<th>No. of days worked</th>
	<th>Basic</th>
	<th>HRA</th>
	<th>Conveyance</th>
	<th>Gross Earning</th>
	<th>PF</th>
	<th>ESI</th>
	<th>Total Deduction</th>
	<th>Net Pay</th>
	</tr>
	";
	$sno = 1;
	while($emp = mysqli_fetch_array($employee)) {

		  $nodw = $emp["No_of_days_worked"];
			$empl = $emp["employee"];
			$Basic = $emp["Basic"];
			$HRA = $emp["HRA"];
			$Allowances = $emp["Allowances"];
			$Conveyance = $emp["Conveyance"];
			$DaysWorked = 0;

			$Basic_Earn = ($nodw/$month)*$Basic;
			$Basic_Earn = round($Basic_Earn,2);

			$HRA_Earn = ($nodw/$month)*$HRA;
			$HRA_Earn = round($HRA_Earn,2);

			$Conveyance_Earn = ($nodw/$month)*$Conveyance;
			$Conveyance_Earn = round($Conveyance_Earn,2);

			$Gross_Earnings = $Basic_Earn + $HRA_Earn + $Conveyance_Earn;
			$Gross_Earnings = round($Gross_Earnings,2);

			$PF_ratio = (12/100);
			$ESI_ratio = (1.75/100);

			$PF = $PF_ratio*$Basic_Earn;
			$PF = round($PF,2);
			$ESI = $ESI_ratio*$Gross_Earnings;
			$ESI = round($ESI,2);

			$Total_Deduction = $PF + $ESI;
			$NET_Pay = $Gross_Earnings - $Total_Deduction;


	    $display .="
	    <tr>
			  <td>
				".$sno."
				</td>
				<td align=\"center\">
				".$empl."
				</td>
	      <td align=\"center\">
	      ".$Basic."
	      </td>
	      <td align=\"center\">
	      ".$HRA."
	      </td>
				<td align=\"center\">
	      ".$Allowances."
	      </td>
				<td align=\"center\">
	      ".$Conveyance."
	      </td>
				<td>
				".$nodw."
				</td>
				<td align=\"center\">
	      ".$Basic_Earn."
	      </td>
	      <td align=\"center\">
	      ".$HRA_Earn."
	      </td>
				<td align=\"center\">
	      ".$Conveyance_Earn."
	      </td>
				<td align=\"center\">
	      ".$Gross_Earnings."
	      </td>
				<td align=\"center\">
	      ".$PF."
	      </td>
				<td align=\"center\">
	      ".$ESI."
	      </td>
				<td align=\"center\">
	      ".$Total_Deduction."
	      </td>
				<td align=\"center\">
	      ".$NET_Pay."
	      </td>
			</tr>
	    ";
			$sno++;
	}

	echo $display;

echo "<div class=\"no\"><a href=\"format1.php?client=".$_POST["client"]."\">Go Back</a>";

}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Salary Sheet</title>
		<link rel="stylesheet" href="format.css">
	</head>
	<body>

	</body>
</html>
