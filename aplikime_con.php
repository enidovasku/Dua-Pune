<?php include("db/config.php"); ?>

<?php

	if (isset($_GET['action'])&&isset($_GET['job'])&&isset($_GET['userId'])) {
		$action = $_GET['action'];
		$job = $_GET['job'];
		$userId=$_GET['userId'];

		$cv_query=mysqli_query($con,"SELECT*FROM user WHERE id='$userId'");
		while($row_user=mysqli_fetch_assoc($cv_query)){
			$query_notification = mysqli_query($con,"INSERT INTO notification(id_user) VALUES ('$userId')");
			if($query_notification){
				echo $row_user['name'];
			}
		}
	}
	elseif( isset($_GET['action'])&&isset($_GET['userId'])&&isset($_GET['jobId'])){

			$action = $_GET['action'];
			$userId = $_GET['userId'];
			$jobId = $_GET['jobId']; 
			
			$aplikim_prano=mysqli_query($con,"UPDATE aplikim SET aplikim.pranuar= 1 WHERE aplikim.id_job = '$jobId' AND aplikim.id_user='$userId'");
			if($row_user=mysqli_fetch_assoc($aplikim_prano)){
				$user_query=mysqli_query($con,"SELECT*FROM user WHERE id='$userId'");
				if($row_user_email=mysqli_fetch_assoc($user_query)){
				mail($row_user_email['email'], "", "Ju jeni perzgjedhur per aplikim");
				}
			}
			header('Location:'. $_SERVER['HTTP_REFERER']);
			}