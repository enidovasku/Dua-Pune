<?php include("header_inside.php"); ?>
<script>
	var active = document.getElementById('profile');
	active.className = "active";
</script>
<div class="dashboard">
	<div class="username">
		<img src="images/user_profile.png"/>
		<div class="name"><?php if (!isset($user)) {
			echo "Ju lutem logohu";
		}else echo $user;?>
		</div>
	</div>
	<div class="dashboard-user">
		<ul>
			<li><a href="profile.php?dashboard=cv">Cv</a></li>
			<li><a href="profile.php?dashboard=aplikime">Aplikimet</a></li>
			<li><a href="profile.php?dashboard=nderroFjalekalimin">Ndrysho Fjalekalimin</a></li>
		</ul>
	</div>
</div>
<div class="main-work">
	<?php 
	if(isset($_GET['dashboard'])){
		if($_GET['dashboard']=='cv'){
			$query = mysqli_query($con, "SELECT vendlindja, universiteti,datelindja, eksperienca FROM user WHERE name = '$user'");
			$row = mysqli_fetch_assoc($query);
		?>
		<div class="cv-show">
			<form method="post" action="profili_con.php" enctype="multipart/form-data">
  			<label>Datelindja:  </label><input type="date" name="datelindja" value="<?php echo $row['datelindja']?>"><br>
			<label>Vendlindja:  </label><input type="text" value="<?php echo $row['vendlindja']?>" name="vendlindja"><br>
			<label>Universiteti:</label><input type="text" value="<?php echo $row['universiteti']?>" name="universiteti"><br>
			<label>Ngarko CV:</label><input type="file" name="cv_upload" ><br>
			<label>Eksperienca: </label><textarea name="eksperienca" cols="70" rows="15"><?php echo $row['eksperienca']?></textarea><br>
			<input type="submit" value="Perditeso" name="perditeso_cv">
			</form>
		</div>
		<?php 
		}
		elseif ($_GET['dashboard']=='aplikime') {
		$query_aplikime=mysqli_query($con,"SELECT * FROM aplikim,company,job, user WHERE  aplikim.id_user = user.id 
			AND aplikim.id_job=job.id AND company.id = job.company_id AND user.name='$user'
			ORDER BY aplikim.id_user");
			?>
			<div class="aplikimet">
			<div class="table-aplikime"> 
				<table>
					  <tr>
				 	   <th>Kompani</th>
				 	   <th>Puna</th>
				 	   <th>Pershkrimi i Punes</th>
				 	 </tr> 
				<?php 		
					while($row_aplikim = mysqli_fetch_assoc($query_aplikime)){	
					?>
				  <tr>
				    <td><?php echo($row_aplikim['company_name']) ?></td>
				    <td><?php echo $row_aplikim['title'] ?></td>
				    <td><?php echo $row_aplikim['descp'] ?></td>
				  </tr>
				</tr>
				<?php 
			}
			?>
			</table>
		</div>
	</div>

		<?php 
		}
		elseif ($_GET['dashboard']=='nderroFjalekalimin') {
			$query = mysqli_query($con, "SELECT name, password FROM user WHERE name = '$user'");
			$row = mysqli_fetch_assoc($query);
			?>
			<div class="nderro-profilin-show">
			<form method="post" action="profili_con.php">
  			<label>Emri:  </label><input type="text" name="name" value="<?php echo $row['name']?>"><br>
			<label>Password:  </label><input type="password" name="password"><br>
			<label>Perserit Passwordin:  </label><input type="password" name="verify_password"><br>
			<input type="submit" value="Perditeso" name="perditeso_profilin">
			</form>
		</div>
		<?php
		}
	}
?>
</div>
