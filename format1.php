<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Salary Sheet</title>
		<link rel="stylesheet" href="format.css">
	</head>
	<body>

	</body>
	<script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;
				var sTablep = document.getElementById('pf').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
			win.document.write(sTablep);
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>
</html>

<?php
include("connect.php");
doDB();
session_start();

if((!isset($_GET['client']) and !isset($_POST["client"])) or $_SESSION['type'] != "admin"){
	header("Location: index.html");
	exit();
}



if(isset($_GET["first"])) {
	$employee_sql = "
	UPDATE client_emp
	SET No_of_days_worked = 0
	WHERE client = '".$_GET['client']."'"
	 ;
	$employee = mysqli_query($con, $employee_sql) or die(mysqli_error($con));
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

		$name_sql = "
		SELECT * from emp_details where employee = ".$empl.";
		";
		$name = mysqli_query($con, $name_sql) or die(mysqli_error($con));

		while($n = mysqli_fetch_array($name)){
			$nm = $n["name"];
			$fname = $n["father_name"];
		}

		$Basic = $emp["Basic"];
		$HRA = $emp["HRA"];
		$Allowances = $emp["Allowances"];
		$Conveyance = $emp["Conveyance"];
		$DaysWorked = 0;

    $display .="
    <tr>
			<td align=\"center\">
			".$empl."<br>".$nm."<br>"."S/o ".$fname."
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
<div class=\"year\">Year: <input type=\"text\" name=\"year\"required> <br></div>
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
	$year = $_POST["year"];
	if( (0 == $year % 4) and (0 != $year % 100) or (0 == $year % 400) )
			 {
					 if ($month == "28") {
					 	$month = "29";
					 }
			 }
	$employee_sql = "SELECT * from client_emp where client = ".$_POST['client']." ORDER BY employee";
	$employee = mysqli_query($con, $employee_sql) or die(mysqli_error($con));
	$pfchallan = "
	<div id=\"pf\">
	<table cellpadding = \"3\" cellspacing = \"1\" border = \"1\" align=\"center\" width=\"25%\" class=\"last\">
	<tr>
	<th> </th>
	<th> Employee Contribution </th>
	<th> Employer Contribution </th>
	</tr>
	";
	$display = "
	<div id=\"tab\">
	<table id=\"tblCustomers\" cellpadding = \"3\" cellspacing = \"1\" border = \"1\" align=\"center\" width=\"50%\" class=\"tab\">
  <tr>
	<th>".$month."</th>
	<th></th>
	<th colspan=\"4\">Rate</th>
	<th></th>
	<th colspan=\"4\">Earnings</th>
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
  <th>Allowances</th>
	<th>Conveyance</th>
	<th>Gross Earning</th>
	<th>PF</th>
	<th>ESI</th>
	<th>Total Deduction</th>
	<th>Net Pay</th>
	</tr>
	";
	$sno = 1;
	$pf_total = 0;
	$epf_wages = 0;
	$edli_wages = 0;
	while($emp = mysqli_fetch_array($employee)) {

		  $nodw = $emp["No_of_days_worked"];
			$empl = $emp["employee"];

			$name_sql = "
			SELECT * from emp_details where employee = ".$empl.";
			";
			$name = mysqli_query($con, $name_sql) or die(mysqli_error($con));

			while($n = mysqli_fetch_array($name)){
				$nm = $n["name"];
				$fname = $n["father_name"];
			}

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

			$Allowances_Earn = ($nodw/$month)*$Allowances;
			$Allowances_Earn = round($Allowances_Earn,2);

			$Gross_Earnings = $Basic_Earn + $HRA_Earn + $Conveyance_Earn;
			$Gross_Earnings = round($Gross_Earnings,2);

			$PF_ratio = (12/100);
			$ESI_ratio = (1.75/100);

			$Pf_d = $emp["pf_deduction"];
			if($Pf_d == "1"){
				$PF = 0;
				$pf_total = $pf_total + $PF;
			}
			if ($Pf_d == "2") {
				$PF = $PF_ratio*15000;
				$PF = round($PF,2);
				$pf_total = $pf_total + $PF;
			}

				if ($Pf_d == "3") {
					$PF = $PF_ratio*$Basic_Earn;
					$PF = round($PF,2);
					$pf_total = $pf_total + $PF;
				}




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
				".$empl."<br>".$nm."<br>"."S/o ".$fname."
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
	      ".$Allowances_Earn."
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

			if($PF>0){
				$epf_wages = $epf_wages + $Basic_Earn;
			}

			if ($PF>0) {
				if($Basic_Earn<15000){
					$edli_wages = $edli_wages + $Basic_Earn;
				}
				elseif($Basic_Earn>15000){
					if ($emp["pf_deduction"]==2) {
						$edli_wages = $edli_wages + 15000;
					}
					elseif ($emp["pf_deduction"]==3) {
						$edli_wages = $edli_wages + $Basic_Earn;
					}
				}
			}


	}
	$display.="
</table>
</div>
	";
	echo $display."<br>";

		if ((($epf_wages*0.5)/100)>500) {
			$ec2 = ($epf_wages*0.5)/100;
		}
		else {
			$ec2 = 500;
		}

		$ec3 = ($epf_wages*8.33)/100;
		$ec3 = round($ec3,0);

		$ec4 = $pf_total-$ec3;
		$pfchallan.="
		<tr>
		<td>1</td>
		<td>".$pf_total."</td>
		<td>".$ec4."</td>
		</tr>
		<tr>
			<td>2</td>
			<td>0</td>
			<td>".$ec2."</td>
		</tr>
		<tr>
			<td>10</td>
			<td>0</td>
			<td>".$ec3."</td>
		</tr>
		<tr>
			<td>21</td>
			<td>0</td>
			<td>".$edli_wages."</td>
		</tr>
		<tr>
			<td>22</td>
			<td>0</td>
			<td>0</td>
		</tr>
		";
$pfchallan.="
</table>
</div>
";
		echo $pfchallan."<br>";

	 echo "<div class=\"no\"><a href=\"format1.php?client=".$_POST["client"]."\">Go Back</div></a>";

	 echo "
	 <p>
	         <input type=\"button\" value=\"Create PDF\"
	             id=\"btPrint\" onclick=\"createPDF()\" />
	     </p>
	 ";

	//echo "<a href=\"download.php?client=".$_POST['client']."&month=".$_POST['month']."\">Download</div></a>";

//	 echo "<div class=\"down\"><a href=\"download.php?client=".$_POST['client']."&month=".$_POST['month']."&year=".$_POST["year"]."\">Download</div></a>";
}

 ?>
