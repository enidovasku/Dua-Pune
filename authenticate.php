<?php include("db/config.php"); ?>

<?php

if(!isset($_POST['company_checkbox'])){
	if (isset($_POST['sign_up_button'])) {
	// Regjistrimi i studentit

	$name = mysqli_escape_string($con,$_POST['name']);
	$password = mysqli_escape_string($con,$_POST['password']);
	$verifyPassword= mysqli_escape_string($con,$_POST['verify_password']);
	$securePass=md5($password);
	$email = mysqli_escape_string($con,$_POST['email']);
	
	if (strlen($name)>3 && filter_var($email, FILTER_VALIDATE_EMAIL) &&strlen($password)>6 && $password == $verifyPassword){	
		$query = mysqli_query($con ,"INSERT INTO user (name,password,email) VALUES ('$name','$securePass','$email')");
	}

	if($query){
		session_start();
		$_SESSION['user'] = $name;
		header('Location:profile.php');
	}
	else{
		echo "Provo Perseri";
		}
	
	}
}elseif(isset($_POST['company_checkbox'])) {
	// Regjistrimi i Kompanise

	$name = mysqli_escape_string($con,$_POST['name']);
	$password = mysqli_escape_string($con,$_POST['password']);
	$verifyPassword= mysqli_escape_string($con,$_POST['verify_password']);
	$securePass=md5($password);
	$email = mysqli_escape_string($con,$_POST['email']);
	
	if (strlen($name)>3 && filter_var($email, FILTER_VALIDATE_EMAIL) &&strlen($password)>6 && $password == $verifyPassword ) {	
		$query = mysqli_query($con ,"INSERT INTO company (company_name,company_password,company_email) VALUES ('$name','$securePass','$email')");
	}

	if($query){
		session_start();
		$_SESSION['user'] = $name;
		header('Location:profile.php');
	}
	else{
		echo "Provo Perseri";
		}
	
	}
if(!isset($_POST['company_checkbox'])){
	if(isset($_POST['sign_in_button'])){
	
	$email = mysqli_escape_string($con,$_POST['email']);
	$password = mysqli_escape_string($con,$_POST['password']);
	$securePass=md5($password);

	$query = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'");
	if(mysqli_num_rows($query)==1){
		$row = mysqli_fetch_assoc($query);
		if ($row['password']==$securePass) {
			if($row['admin']==1){
				session_start();
				$_SESSION['user'] = $email;
				$_SESSION['type'] = 'admin';
				header("Location:admin.php?action=pune");
			}
			else{
				session_start();
				$_SESSION['email']= $email;
				$_SESSION['user'] = $row['name'];
				header("Location:index.php"); 
				}

			}
			else{
				echo "Ju lutem shkruani fjalekalimin sakte";
			}
		}
	else{
		header("Location:login.php");
		}

	}
}
elseif(isset($_POST['company_checkbox'])){
	
	$email = mysqli_escape_string($con,$_POST['email']);
	$password = mysqli_escape_string($con,$_POST['password']);
	$securePass=md5($password);

	$query = mysqli_query($con, "SELECT * FROM company WHERE company_email = '$email'");
	if(mysqli_num_rows($query)==1){
		$row = mysqli_fetch_assoc($query);
		if ($row['company_password']==$securePass) {
				session_start();
				$_SESSION['company_email']= $email;
				$_SESSION['company_name'] = $row['company_name'];
				header("Location:profile_company.php"); 
			}
			else{
				echo "Ju lutem shkruani fjalekalimin sakte";
			}
		}
	else{
		header("Location:login.php");
		}

	}