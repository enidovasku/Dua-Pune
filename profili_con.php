<?php include("db/config.php"); ?>

<?php
	session_start();
	$user = $_SESSION['user'];

	if(isset($_POST['perditeso_cv'])){
		$vendlindja = $_POST['vendlindja'];
		$universiteti = $_POST['universiteti'];
		$eksperienca = $_POST['eksperienca'];
		$datelindja = $_POST['datelindja'];

		//Upload i CV 
		$uploaddir = "uploads/";
		$fileName=basename($_FILES['cv_upload']['name']);
		$upload_file = $uploaddir . $fileName;
		if(move_uploaded_file($_FILES['cv_upload']['tmp_name'], $upload_file)){
			mysqli_query($con,"UPDATE user SET cv_path = '$fileName' WHERE name='$user'");
		}
		

		$query = mysqli_query($con, "UPDATE user SET vendlindja = '$vendlindja',datelindja='$datelindja', universiteti = '$universiteti', eksperienca = '$eksperienca'WHERE name ='$user'");
		if($query) header("location:profile.php?dashboard=cv");
	}


	elseif(isset($_POST['perditeso_profilin'])){
		$name = mysqli_escape_string($con,$_POST['name']);
		$password = mysqli_escape_string($con,$_POST['password']);
		$verifyPassword = mysqli_escape_string($con,$_POST['verify_password']);

		if ($password == $verifyPassword ) {
			$securePass=md5($password);
			$query = mysqli_query($con, "UPDATE user SET name = '$name',password='$securePass' WHERE name ='$user'");
			if($query) header("location:profile.php?dashboard=nderroProfilin");
		}
		else{echo "Fjalekalimi nuk eshte i njejte";}
	}

	elseif (isset($_GET['action'])&&isset($_GET['job'])) {
		$action = $_GET['action'];
		$job = $_GET['job'];

		$query_user=mysqli_query($con,"SELECT * FROM user WHERE name = '$user'");
		$row_user = mysqli_fetch_assoc($query_user);
		$user_id = $row_user['id']; 
		
		$query= mysqli_query($con,"INSERT INTO aplikim(id_user,id_job) VALUES ('$user_id','$job')");
		
		header("Location:index.php");
		

	}

?>