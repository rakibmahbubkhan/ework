<?php

session_start();
if (isset($_SESSION['username'])) {
	$pageTitle = 'Dashboard';
	include 'init.php';

	$numUser =5;
	$latestUser = getLatest('*','user','id', $numUser);
	?>


	<div class="container home-stats admin-top-section">
		<h1>Welcome to dashboard</h1>
		<div class="row">
			

			<div class="col-lg-3">
				<div class="stat">
					<i class="fa fa-users fa-3x"></i>
					<div class="info">
						Total Members
						<span><a href="members.php"><?php echo countItems('id', 'user'); ?></a></span>
					</div>
				</div>
			</div>


			<div class="col-lg-3">
				<div class="pending">
					<i class="fa fa-user-plus fa-3x"></i>
					<div>
						Pending Members
						<span><a href="members.php?do=Manage&page=Pending">
							<?php echo checkItem("regstatus", "user", 0); ?>
						</a></span>
					</div>
				</div>
			</div>


			<div class="col-lg-3">
				<div class="tot-items">
					<i class="fa fa-tag fa-3x"></i>
					<div>
						Total Products
						<span>
							<a href="">10,000</a>
						</span>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="tot-comnts">
					<i class="fa fa-comment fa-3x"></i>
					<div>
						Total Posts
						
						<span><a href="members.php"><?php echo countItems('id', 'jobs'); ?></a></span>
						
					</div>
				</div>
			</div>

		</div>
	</div>



	<div class="latest">
		<div class="container">
			<div class="row">

				<div class="col-lg-6">
					<div class="card">
						<div class="card-header first-card">
							<i class="fa fa-users"></i> Latest <?php echo $numUser; ?> Registered Users
						</div>
						<ul class="list-group list-group-flush latest-users list-unstyled">
							<?php

							if (!empty($latestUser)) {

								foreach ($latestUser as $user) {
								echo "<li><div class='row'><div class='col-lg-6'>".$user['fullname']."</div><div class='col-lg-6' align='right'><span><a href='members.php?do=Edit&id=" . $user['id'] ."' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>";
										if($user['regstatus'] == 0){
								echo"<a href='members.php?do=Activate&id=" . $user['id'] ."' class='btn btn-info confirm'><i class='fa fa-check'></i>  Activate</a></span></div></div></li>";

                                        }
                                 }
							}else{
											echo 'There\'s No Record To Show';
								}

								//$getID = getGroupid('admin', 'groupid');
								

							?>
						</ul>
					</div>
				</div>


				<div class="col-lg-6">
					<div class="card">
						<div class="card-header second-card">
							<i class="fa fa-users"></i> Unapproved Products
						</div>
						<ul class="list-group list-group-flush latest-users list-unstyled">
							
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>



	<?php 
	include $temp.'footer.php';
}else{
	echo "You Are Not Authorized To View This Page!!";
	header('location:index.php');
	exit();
}
?>