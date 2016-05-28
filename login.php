<?php include("header_inside.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login | Dua Pune!</title>
	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="login-background">
	<div class="login-container">
		<div class="sign-up-container">
			<div class="login-box animated fadeInUp">
				<div class="box-header">
					<h2>Krijo nje llogari te Re</h2>
				</div>
				<div class="sign-up">
				<form method="post" action="authenticate.php">
					<label>Emer</label><br /><input type="text" name="name" placeholder="Emer" /><br />
					<label>Fjalekalimi</label><br /><input type="password" name="password" placeholder="Fjalekalimi"/><br />
					<label>Perserit Fjalekalimin</label><br /><input type="password" name="verify_password" placeholder="Perserit Fjalekalimin"/><br />
					<label>Email</label><br /><input type="text" name="email" placeholder="Email"/><br />
					<input type="checkbox" name="company_checkbox" ><label>Regjistrohu si Kompani</label><br>
					<input type="submit" value="Regjistrohu" name="sign_up_button"/>
				</form>
				</div>
			</div>
		</div>
	</div>
	<div class="sign-in-container">
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2> Hyr</h2>
			</div>
			<div class="sign-in">
				<form method="post" action="authenticate.php">
					<label>Email</label><br><input type="text" name="email" placeholder="Email"/><br />
					<label>Fjalekalimi</label><br><input type="password" name="password" placeholder="Fjalekalimi"><br />
					<input type="checkbox" name="company_checkbox" ><label>Hyr si Kompani</label><br>
					<input type="submit" value="Log in" name="sign_in_button"/><br />
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	var active = document.getElementById('login');
	active.className = "active";
</script>
</body>
</html>