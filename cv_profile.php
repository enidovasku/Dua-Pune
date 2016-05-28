<?php include("header_inside.php"); ?>

	<?php
	if(isset($_GET['userId'])){
		$userId = $_GET['userId'];

		$query= mysqli_query($con,"SELECT* FROM user WHERE id='$userId'");
		if($row=mysqli_fetch_assoc($query)){
		$name= $row['name'];
		$email= $row['email'];
		$vendlindja=$row['vendlindja'];
		$datelindja=$row['datelindja'];
		$universiteti= $row['universiteti'];
		$eksperienca=$row['eksperienca'];
		$cv_path = $row['cv_path'];
			}
		}?>

	<div class="cv-container">
		<div class="cv-photo">
			<img src="images/profile_picture.png">
		</div>
		<div class="student">
			<div class="student-name">
				<div class="student-name-label">
					Une jam <?php echo ucfirst($name);?>	
				</div>
			</div>
			<div class="breakline">
				<hr>
			</div>
			<div class="student-info">
				<div class="student-label">
					<label>Email</label><br><br>
					<label>Datelindja</label><br><br>
					<label>Vendlindja</label><br><br>
					<label>Universiteti</label><br><br>
					<label>Eksperienca</label>
				</div>
				<div class="student-data">
					<label><?php echo $email; ?></label><br><br>
					<label><?php echo $datelindja; ?></label><br><br>
					<label><?php echo $vendlindja; ?></label><br><br>
					<label><?php echo $universiteti; ?></label><br><br>
					<label><?php echo $eksperienca; ?></label>
				</div>
			</div>
		</div>
		<div class="cv-footer">
			<?php 
			$download_cv='uploads/'.$cv_path;
			if($cv_path != ''){
			echo '<center><a href="'.$download_cv.'">SHKARKO CV</a></center>'; }
			else echo '<center><a href="#">Cv nuk eshte ngarkuar</a></center>';
			?>
		</div>

	</div>
