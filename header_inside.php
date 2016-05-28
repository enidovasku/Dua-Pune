<?php include("db/config.php"); ?>
<?php 
	session_start();
	if(isset($_SESSION['user'])) $user = $_SESSION['user'];
	if(isset($_SESSION['company_name'])) $company_name = $_SESSION['company_name'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="header_inside">
		<ul>
				<img class="header-inside-image" src="images/worker.svg"/>
		<?php 
			if(!isset($_SESSION['user']) && !isset($_SESSION['company_name'])){
		?>

			<li><a href="login.php"id="login">Login</a>
		<?php }else {	?>
			<li><a href="logout.php" id="login">Logout</a>
		<?php } ?>
		<!-- Company Profile -->
		<?php 
			if(isset($_SESSION['company_name'])){
		?>
			<li><a href="profile_company.php" id="profile">Profili</a></li>
		<?php }else {	?>
			<li><a href="profile.php" id="profile">Profili</a></li>
		<?php } ?> 

			<li><a href="company.php" id="company">Kompani</a></li>
			<li><a href="jobs.php" id="job">Punet</a></li>
			<li><a href="index.php" id="home">Kreu</a></li>
		</ul>
	</div>

