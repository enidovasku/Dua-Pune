<?php include("profile_company.php"); ?> 

<div class="aplikimet">
		<div class="table-aplikime"> 
			<table>
				  <tr>
				    <th>Emri</th>
				    <th>Email</th>
				    <th>Prano Aplikime</th>
				    <th>Shiko Cv</th>
				  </tr>
<?php 

	if (isset($_GET['job'])) {
		$job = $_GET['job'];

		$query_aplikime=mysqli_query($con,"SELECT * FROM aplikim, user WHERE  aplikim.id_job = '$job' AND user.id=aplikim.id_user AND aplikim.pranuar=0 ORDER BY user.id");
		while($row_aplikim = mysqli_fetch_assoc($query_aplikime)){
		?>
				  <tr>
				    <td><?php echo ucfirst($row_aplikim['name']) ?></td>
				    <td><?php echo $row_aplikim['email'] ?></td>
				    <td><a href="aplikime_con.php?action=prano&userId=<?php echo $row_aplikim['id_user'];?>&jobId=<?php echo $row_aplikim['id_job'];?>">Prano</a></td>
				  	<td><a href="cv_profile.php?userId=<?php echo $row_aplikim['id_user'];?>">Shiko CV</a></td>
				  </tr>
				</tr>
				<?php 
			}
			?>
			</table>
		</div>
	<?php } ?>
	</div>
