<!--HEADER OF THE SITE STARTS HERE-->
<?php
$query ='';
            if (isset($GET['page']) && $_GET['page'] == 'Pending' ){
                $query = 'AND regstatus = 0';
            }

$statement = $con->prepare("SELECT * FROM user WHERE groupid != 1 $query ORDER BY id DESC");
                $statement->execute();
                $rows = $statement->fetchAll();

                if (!empty($rows)){
					foreach ($rows as $row) 
?>
<section>
<header>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">


					<!--NAVIGATION MENU STARTS-->


					<nav class="navbar navbar-expand-md fixed-top">
				<a class="navbar-brand" href="dashboard.php"><strong>E-work</strong></a>

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						
						<div class="collapse navbar-collapse" id="navbarCollapse">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item ">
									<a class="nav-link btn green-white-btn" href="post.php">Post a Job</a>
								</li>
                                <li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle btn white-border" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-search"></i> Search
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Browse Product</a>
                                    <div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Browse Seller</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="browse.php">Browse Jobs</a>
									</div>
								</li>
								<li class="nav-item">
									<a class="nav-link icons" href="#two" title="Workstream"><i class="far fa-envelope"></i></a>
								</li>
								
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img class="rounded-circle" src="layout/image/dp.jpg" alt="" width="40">
									</a>
									<div class="dropdown-menu profile-dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="<?php echo"members.php?do=Edit&id=" . $row['id'];} ?>">Edit profile</a>
									<a class="dropdown-item" href="post.php">Post Job</a>
									<a class="dropdown-item" href="#">Workstream</a>
									<a class="dropdown-item" href="#">Freelancing Activity</a>
                                    <a class="dropdown-item" href="#">Buyer Activity</a>
                                    <a class="dropdown-item" href="contact.php">Contact Us</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="logout.php">Logout</a>
									</div>
								</li>
							</ul>
						</div>
					</nav>

					<!--NAVIGATION MENU ENDS-->
				</div>
			</div>
		</div>
	</header>
	</section>