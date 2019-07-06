<?php

	include("connect.php");
	session_start();

		doDB();
		$login_sql = "SELECT password from login where id = '".$_POST['user']."' and type = '".$_POST['type']."'";
		$login_res = mysqli_query($con, $login_sql) or die(mysqli_error($con));


		if(mysqli_num_rows($login_res)<1)
       		{
        	header("Location: index.html");
       		}

		else{

		while($info = mysqli_fetch_array($login_res)) {
			$pass = $info['password'];
		}




		if ($_POST['pass']==$pass) {
			$_SESSION['id'] = $_POST['user'];

			if($_POST['type']=='Employee'){
			$_SESSION['type']='Employee';
			header("Location: Employee.php");
			}

		 	if($_POST['type']=='Client'){
			$_SESSION['type']='Client';
			header("Location: Client.php");
			}

			if($_POST['type']=='admin'){
			$_SESSION['type']='admin';
			header("Location: admin.php");
			}
				}

		else {
			 //echo "Wrong Password";
			 echo "<script>
			 alert('Please Check Your ID and Password!!!');
			 window.location.href='index.html';
			 </script>";
		}

		}


?>
