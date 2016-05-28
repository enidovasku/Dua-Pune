<?php include("db/config.php"); ?>

<?php
	session_start(); 
	if(!isset($_SESSION['type'])){
		header("Location:index.php");
	}
	else{
		if (isset($_GET['userId'])) {
			$userId= $_GET['userId'];

			$query=mysqli_query($con,"SELECT id FROM user");
		 	$row = mysqli_fetch_assoc($query);

		 	if($row){
		 		mysqli_query($con,"DELETE FROM user WHERE id ='$userId'");
		 		header("Location:". $_SERVER['HTTP_REFERER']);
		 	}
		}


		elseif (isset($_GET['companyId'])) {
			$companyId=$_GET['companyId'];

			$query=mysqli_query($con,"SELECT id FROM company");
		 	$row = mysqli_fetch_assoc($query);

		 	if($row){
		 		mysqli_query($con,"DELETE FROM company WHERE id ='$companyId'");
		 		header("Location:". $_SERVER['HTTP_REFERER']);
		 	}
		}


		elseif (isset($_GET['jobId'])) {
			$jobId=$_GET['jobId'];

			$query=mysqli_query($con,"SELECT id FROM job");
		 	$row = mysqli_fetch_assoc($query);

		 	if($row){
		 		mysqli_query($con,"DELETE FROM job WHERE id ='$jobId'");
		 		header("Location:". $_SERVER['HTTP_REFERER']);
		 	}
		}
	
	}