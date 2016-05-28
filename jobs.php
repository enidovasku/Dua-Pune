<?php include("header_inside.php"); ?>

<?php 
	if(!isset($_GET['job'])){
		if(!isset($_GET['search'])){
?>

<div class="show-jobs">
	<?php 
		$query = mysqli_query($con, "SELECT*FROM company,job WHERE company.id = job.company_id ORDER BY job.id DESC");
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

	<?php }else{ ?>
	<!--po kerkon-->
	<?php
		$search = $_GET['search']; 
		$query = mysqli_query($con, "SELECT * FROM job, company WHERE company.id = job.company_id AND (job.title LIKE '%$search%' OR company_name LIKE '%$search%')");
		while($row = mysqli_fetch_assoc($query)){
	?>
	<div class="card-container">
			<div class="card">
				<img src="alt="" />
				<div class="title"><a href="jobs.php?job=<?php echo $row['id']?>"><?php echo $row['title']?></a></div>
				<div class="desc"><?php echo $row['descp']?></div>
				<div class="company"><?php echo $row['company_name']?></div>
			</div>
		</div>
	<?php }?>
	<?php }?>

<?php }else{ ?>

<?php	
	$job_id = $_GET['job'];
	$query = mysqli_query($con, "SELECT*FROM company,job WHERE company.id = job.company_id AND job.id = '$job_id'");
	$row = mysqli_fetch_assoc($query);
?>

	<div class="card-container">
			<div class="card">
				<img src="data:image/png;base64,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" alt="" />
				<div class="title"><a href="jobs.php?job=<?php echo $row['id']?>"><?php echo $row['title']?></a></div>
				<div class="desc"><?php echo $row['descp']?></div>
				<div class="company"><?php echo $row['company_name']?></div>
			</div>
		</div>

<?php }?>	
<script>
	var active = document.getElementById('job');
	active.className = "active";
</script>