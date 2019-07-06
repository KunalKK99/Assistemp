<?php
include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id'])  or $_SESSION['type'] != "admin" or !isset($_POST)) {
	header("Location: index.html");
	exit();
}

if($_POST['upload']=='employee'){

  $month = $_POST['month'];
  $year = $_POST['year'];
//  $file = $_POST['pdf'];

for ($i=1; $i <= 10 ; $i++) {
	$emp_id = $_POST["Employee_ID_$i"];
	$target_dir = "C:/xampp/htdocs/Assistemp/files/".$emp_id."/".$month."/";
  $target_file = $target_dir.basename($_FILES["pdf_$i"]["name"]);


    if(move_uploaded_file($_FILES["pdf_$i"]["tmp_name"], $target_file)){
      echo "The file for Employee $emp_id is uploaded sucessfully! <br>";

      echo "<a href='admin.php' target='_blank'>Back</a>";
    }
    else {
			if($emp_id!=""){
      echo "The file is not uploaded";

      echo "<a href='admin.php' target='_blank'>Back</a>";
		}
    }
	}

}

if($_POST['upload']=='client'){

	$client_id = $_POST['Client_Id'];
  $month = $_POST['month'];


	$target_dir = "C:/xampp/htdocs/Assistemp/files/".$client_id."/".$month."/";
	$target_file_1 = $target_dir.basename($_FILES["pdf1"]["name"]);
	$target_file_2 = $target_dir.basename($_FILES["pdf2"]["name"]);
	$target_file_3 = $target_dir.basename($_FILES["pdf3"]["name"]);
	$uploadOk =1;

	if($uploadOk==1){
    if(move_uploaded_file($_FILES["pdf1"]["tmp_name"], $target_file_1)
		and move_uploaded_file($_FILES["pdf2"]["tmp_name"], $target_file_2)
		and move_uploaded_file($_FILES["pdf3"]["tmp_name"], $target_file_3)){
      echo "The file is uploaded!";

      echo "<a href='admin.php' target='_blank'>Back</a>";
    }
    else {
      echo "The file is not uploaded";

      echo "<a href='admin.php' target='_blank'>Back</a>";
    }

}
}
 ?>
