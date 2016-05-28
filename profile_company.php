<?php include("header_inside.php"); ?>
<script>
	var active = document.getElementById('profile');
	active.className = "active";
</script>
<div class="dashboard">
	<div class="username">
		<img src="images/company_icon.png"/>
		<div class="name"><?php if (!isset($company_name)) {
			echo "Ju lutem logohu";
		}else echo $company_name;?>
		</div>
	</div>
	<div class="dashboard-user">
		<ul>
			<li><a href="profile_company.php?dashboard=shtoPune">Shto Pune</a></li>
			<li><a href="profile_company.php?dashboard=shikoPunet">Shiko Punet</a></li>
			<li><a href="profile_company.php?dashboard=descp">Pershkrimi</a></li>
			<li><a href="profile_company.php?dashboard=nderroFjalekalimin">Nderro Fjalekalimin</a></li>
		</ul>
	</div>
</div>
<div class="main-work">
	<?php 
	if(isset($_GET['dashboard'])){
		if($_GET['dashboard']=='shtoPune'){
			$query = mysqli_query($con, "SELECT vendlindja, universiteti,datelindja, eksperienca FROM user WHERE name = '$user'");
			$row = mysqli_fetch_assoc($query);
		?>
		<div class="shto-pune">
			<form method="post" action="profile_company_con.php">
  			<label>Titulli:  </label><br><textarea type="text" name="title" value="" cols="40" rows="3"></textarea><br>
			<label>Pershkrimi:  </label><br><textarea type="text" value="" name="descp" cols="50" rows="4"></textarea><br>
			<input type="submit" value="Shto Pune" name="shtoPune">
			</form>
		</div>
		
		<?php 
		}
		elseif ($_GET['dashboard']=='shikoPunet') {

		$query_company_id = mysqli_query($con,"SELECT*FROM company WHERE company_name='$company_name'");
		$row_id = mysqli_fetch_assoc($query_company_id);
		$company_id=$row_id['id'];

		$query = mysqli_query($con, "SELECT*FROM job WHERE company_id='$company_id' ORDER BY job.id DESC");
		while($row = mysqli_fetch_assoc($query)){
	?>
		<div class="card-container">
			<div class="card">
				<img src="images/job_icon.png">
				<div class="title"><a href="jobs.php?job=<?php echo $row['id']?>"><?php echo $row['title']?></a></div>
				<div class="desc"><?php echo $row['descp']?></div>
				<div class="shiko-aplikimet"><a href="aplikime.php?job=<?php echo $row['id'] ?>">Shiko Aplikimet</a></div>
			</div>
		</div>
	<?php
		}
	?>	
		<?php 
		}
		
		elseif ($_GET['dashboard']=='shikoPunet') {

		$query_company_id = mysqli_query($con,"SELECT*FROM company WHERE company_name='$company_name'");
		$row_id = mysqli_fetch_assoc($query_company_id);
		$company_id=$row_id['id'];

		$query = mysqli_query($con, "SELECT*FROM job WHERE company_id='$company_id' ORDER BY job.id DESC");
		while($row = mysqli_fetch_assoc($query)){
	?>
		<div class="card-container">
			<div class="card">
				<img src="images/job_icon.png">
				<div class="title"><a href="jobs.php?job=<?php echo $row['id']?>"><?php echo $row['title']?></a></div>
				<div class="desc"><?php echo $row['descp']?></div>
				<div class="shiko-aplikimet"><a href="profile_company_con.php?action=shikoAplikimet&job=<?php echo $row['id'] ?>">Shiko Aplikimet</a></div>
			</div>
		</div>
	<?php
		}
	?>


		<?php 
		}
		elseif ($_GET['dashboard']=='nderroFjalekalimin') {
			$query = mysqli_query($con, "SELECT company_name, company_password FROM company WHERE company_name = '$company_name'");
			$row = mysqli_fetch_assoc($query);
			?>
			<div class="nderro-profilin-show">
			<form method="post" action="profile_company_con.php">
  			<label>Kompania</label><br><input type="text" name="name" value="<?php echo $row['company_name']?>"><br>
			<label>Fjalekalimi</label><br><input type="password" name="password"><br>
			<label>Perserit Fjalekalimin</label><br><input type="password" name="verify_password"><br>
			<input type="submit" value="Perditeso" name="perditeso_profilin">
			</form>
		</div>
		<?php
		}

		elseif ($_GET['dashboard']=='descp') {
			$query = mysqli_query($con, "SELECT company_descp FROM company WHERE company_name = '$company_name'");
			$row = mysqli_fetch_assoc($query);
			?>
			<div class="company-descp">
				<form method="post" action="profile_company_con.php">
		  			<label>Pershkrimi:</label><br><textarea name="descp" cols="70" rows="15"><?php echo $row['company_descp']?></textarea><br>
					<input type="submit" value="Perditeso Pershkrimin" name="perditeso_descp">
				</form>
		</div>
		<?php
		}
	}
?>
</div>