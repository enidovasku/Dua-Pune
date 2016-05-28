<?php include("db/config.php"); ?>
<link rel="stylesheet" type="text/css" href="css/admin.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<?php
	session_start(); 
	if(!isset($_SESSION['type'])){
		header("Location:index.php");
	}
	else{
		?>
		<div class="nagivation-admin">
			<ul>
				<li><a href="admin.php?action=student">Studentet</a></li>
				<li><a href="admin.php?action=kompani">Kompanite</a></li>
				<li><a href="admin.php?action=pune">Punet</a></li>
				<li><a href="logout.php">Largohu</a></li>
			</ul>
		</div>
				<?php
					if ($_GET['action']=='student') {
						$query = mysqli_query($con,"SELECT*FROM user WHERE admin='0'");?>
						<div class="aplikimet">
							<div class="table-aplikime"> 
								<table>
							  		<tr>
							    	<th>Studentet</th>
							   		 <th>Perditso</th>
							  		</tr>
						<?php
						while($row=mysqli_fetch_assoc($query)){
							?>
							 <tr>
							    <td><?php echo $row['email'] ?></td>
							    <td><a href="admin_con.php?userId=<?php echo $row['id'];?>">Fshi</a></td>
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
		elseif ($_GET['action']=='kompani') {
			$query = mysqli_query($con,"SELECT*FROM company");?>
						<div class="aplikimet">
							<div class="table-aplikime"> 
								<table>
							  		<tr>
							    	<th>Kompanite</th>
							   		 <th>Perditso</th>
							  		</tr>
						<?php
			while($row=mysqli_fetch_assoc($query)){?>
				 <tr>
							    <td><?php echo $row['company_email'] ?></td>
							    <td><a href="admin_con.php?companyId=<?php echo $row['id'];?>">Fshi</a></td>
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
		elseif ($_GET['action']=='pune') {
			$query = mysqli_query($con,"SELECT*FROM job");?>
						<div class="aplikimet">
							<div class="table-aplikime"> 
								<table>
							  		<tr>
							    	<th>Punet</th>
							   		 <th>Perditso</th>
							  		</tr>
						<?php
			while($row=mysqli_fetch_assoc($query)){?>
				 <tr>
							    <td><?php echo $row['title'] ?></td>
							    <td><a href="admin_con.php?jobId=<?php echo $row['id'];?>">Fshi</a></td>
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
	}