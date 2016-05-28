<?php include("db/config.php"); ?>

<?php
	session_start();
	$company_name = $_SESSION['company_name'];

	if(isset($_POST['shtoPune'])){
		$title=$_POST['title'];
		$descp = $_POST['descp'];
		$query_company_id = mysqli_query($con,"SELECT*FROM company WHERE company_name='$company_name'");
		$row_id = mysqli_fetch_assoc($query_company_id);
		$company_id=$row_id['id'];

		$query=mysqli_query($con,"INSERT INTO job (title,descp,company_id) VALUES ('$title','$descp','$company_id')");
		if($query) header("location:profile_company.php?dashboard=shikoPunet");
	}

	elseif(isset($_POST['shikoPunet'])){
		echo "Po shof punet";
	}

	elseif(isset($_POST['descp'])){
		$descp = $_POST['descp'];

		$query = mysqli_query($con, "UPDATE company SET company_descp = '$descp' WHERE company_name ='$company_name'");
		if($query) header("location:profile_company.php?dashboard=descp");
	}
	elseif(isset($_POST['perditeso_profilin'])){
		$name = mysqli_escape_string($con,$_POST['name']);
		$password = mysqli_escape_string($con,$_POST['password']);
		$verifyPassword = mysqli_escape_string($con,$_POST['verify_password']);

		if ($password == $verifyPassword ) {
			$securePass=md5($password);
			$query = mysqli_query($con, "UPDATE company SET company_name = '$name',company_password='$securePass' WHERE company_name ='$company_name'");
			if($query) header("location:profile_company.php");
		}
		else{echo "Fjalekalimi nuk eshte i njejte";}


	}