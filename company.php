<?php include("header_inside.php"); ?>

<div class="show-jobs">
	<?php 
		$query = mysqli_query($con, "SELECT*FROM company ORDER BY company.id ");
		while($row = mysqli_fetch_assoc($query))
		{
	?>
		<div class="card-container">
			<div class="card">
				<img src="images/company_icon.png"/>
				<div class="company"><?php echo $row['company_name']?></div>
				<div class="desc"><?php echo $row['company_descp']?></div>
			</div>
		</div>
	<?php
		}
	?>

</div>

<script>
	var active = document.getElementById('company');
	active.className = "active";
</script>