<?php include "header.php"?>

<div class="dashboard-container">

<b><div class="dashboard-heading">DASHBOARD</div></b>
<a href="index.php"><button type="button" class="btn btn-secondary">Back to Login Page</button></a>

	

	
	<hr>
<div class="container">
	<div class="row">
		<?php 
			
			$sql = "SELECT COUNT(*) AS Users FROM users";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$count = $row['Users'];
		
		?>
		<div class="col-md-3">
			<a href="userlis.php">
			<div class="card2">
				<div class="card-body">
					<b><span>Total Users</span><br></b>
					<b><span>(<?php echo $count; ?>)</span></b>
				</div>
			</div>
			</a>	
		</div>

		<div class="col-md-3">
			<a href="location.php">
			<div class="card1">
				<div class="card-body">


					<?php
            					$sql = "SELECT COUNT(*) AS locations FROM locations";
								$result = $conn->query($sql);
								$row = $result->fetch_assoc();
								$count = $row['locations'];
     				 ?> 
				 	 <b><span>Locations</span><br></b>
					<b><span>(<?php echo $count; ?>)</span></b>

				</div>
			</div>
			</a>
		</div>

		

		<div class="col-md-3">
			<a href="https://github.com/">
			<div class="card3">
				<div class="card-body">
					 <b><span>My Github</span></b>
					
				</div>
			</div>
			</a>
		</div>	

		<div class="col-md-3">
			<a href="https://www.w3schools.com/">
			<div class="card4">
				<div class="card-body">
					<b><span>w3 Schools</span></b>
				</div>
			</div>	
		</a>
		</div>	

<?php include "footer.php" ?>
