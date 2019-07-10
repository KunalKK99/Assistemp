<?php
include("connect.php");
doDB();
session_start();

$delimiter = ",";
$filename = $_GET['client'] ."format1". ".csv";
$f = fopen('php://memory', 'w');
$month = $_GET["month"];

$fields = array($month, '', 'Rate', 'Rate', 'Rate', 'Rate', '', 'Earnings', 'Earnings', 'Earnings', 'Earning', '', 'Deduction', 'Deduction', '', '');
fputcsv($f, $fields, $delimiter);
$fields = array('S.No', 'Name of Employee', 'Basic', 'HRA', 'Allowances', 'Conveyance', 'No. of days worked', 'Basic', 'HRA', 'Allowances','Conveyance', 'Gross Earning', 'PF', 'ESI', 'Total Deduction', 'Net Pay');
fputcsv($f, $fields, $delimiter);

$employee_sql = "SELECT * from client_emp where client = ".$_GET['client']." ORDER BY employee";
$employee = mysqli_query($con, $employee_sql) or die(mysqli_error($con));


$sno = 1;
$pf_total = 0;
$epf_wages = 0;
$edli_wages = 0;
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

  $Allowances_Earn = ($nodw/$month)*$Allowances;
  $Allowances_Earn = round($Allowances_Earn,2);

  $Gross_Earnings = $Basic_Earn + $HRA_Earn + $Conveyance_Earn;
  $Gross_Earnings = round($Gross_Earnings,2);

  $PF_ratio = (12/100);
  $ESI_ratio = (1.75/100);

  $PF = $PF_ratio*$Basic_Earn;
  $PF = round($PF,2);
  $pf_total = $pf_total + $PF;

  $ESI = $ESI_ratio*$Gross_Earnings;
  $ESI = round($ESI,2);

  $Total_Deduction = $PF + $ESI;
  $NET_Pay = $Gross_Earnings - $Total_Deduction;

  $lineData = array($sno, $empl, $Basic, $HRA, $Allowances, $Conveyance, $nodw, $Basic_Earn, $HRA_Earn, $Allowances_Earn,$Conveyance_Earn, $Gross_Earnings, $PF, $ESI, $Total_Deduction, $NET_Pay);
  fputcsv($f, $lineData, $delimiter);
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

  if ((($epf_wages*0.5)/100)>500) {
    $ec2 = ($epf_wages*0.5)/100;
  }
  else {
    $ec2 = 500;
  }

  $ec3 = ($epf_wages*8.33)/100;
  $ec3 = round($ec3,0);

  $ec4 = $pf_total-$ec3;

}
$fields = array('');
fputcsv($f, $fields, $delimiter);
$fields = array('', 'Employee Contribution', 'Employer Contribution');
fputcsv($f, $fields, $delimiter);
for ($i=1; $i <=5 ; $i++) {


if($i=='1'){
  $q = '1';
  $w = $pf_total;
  $e = $ec4;
}

if ($i=='2') {
  $q = '2';
  $w = '0';
  $e = $ec2;
}

if ($i=='3') {
  $q = '10';
  $w = '0';
  $e = $ec2;
}

if ($i=='4') {
  $q = '10';
  $w = '0';
  $e = $ec3;
}

if ($i=='5') {
  $q = '22';
  $w = '0';
  $e = '0';
}

$lineData = array($q, $w, $e);
fputcsv($f, $lineData, $delimiter);

}

fseek($f, 0);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '";');

fpassthru($f);
 ?>
