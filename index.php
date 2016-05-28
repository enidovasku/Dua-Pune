<?php include("header.php"); ?>
	<div class="main">
	<div class="newjobs">Punet me te reja: </div>
	<?php 
		$query = mysqli_query($con, "SELECT*FROM company,job WHERE company.id = job.company_id ORDER BY job.id DESC LIMIT 4");
		while($row = mysqli_fetch_assoc($query))
		{
	?>
		<div class="card-container">
			<div class="card">
				<img src="images/job_icon.png">
				<div class="title"><a href="jobs.php?job=<?php echo $row['id']?>"><?php echo $row['title']?></a></div>
				<div class="desc"><?php echo $row['descp']?></div>
				<div class="company"><?php echo $row['company_name']?></div> 
				<?php 
				//ta shfaq butonin?
				if(isset($_SESSION['user'])){
					$user = $_SESSION['user'];
					$job_id = $row['id'];
					$query_check = mysqli_query($con, "SELECT * FROM aplikim, user, job WHERE
						aplikim.id_user = user.id AND user.name = '$user' AND aplikim.id_job = job.id AND job.id = '$job_id'");
					$result_aplikim = mysqli_num_rows($query_check);
					if($result_aplikim == 0){
				?>
					<div class="aplication-button"><a href="profili_con.php?action=apliko&job=<?php echo $row['id'] ?>">Apliko</a></div>
				<?php
			}}
				?>		
			</div>
		</div>
	<?php		
		}
	?>
		
	</div>
	<script>
	var active = document.getElementById('home');
	active.className = "active";
	</script>
	<?php include("footer.php"); ?>
</body>
</html>