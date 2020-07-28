<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="layout/css/bootstrap.css">
   <link rel="stylesheet" href="layout/css/bootstrap.min.css">
	<link rel="stylesheet" href="layout/css/style.css">
    <title>E-Work</title>
		<!-- stylesheet used for icons -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>
	<!--HEADER OF THE SITE STARTS HERE-->
	<header>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">


					<!--NAVIGATION MENU STARTS-->


					<nav class="navbar navbar-expand-md fixed-top">
				<a class="navbar-brand" href="index.php"><strong>E-work</strong></a>

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
									<a class="dropdown-item" href="#">Browse Jobs</a>
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
									<a class="dropdown-item" href="#">Edit profile</a>
									<a class="dropdown-item" href="post.php">Post Job</a>
									<a class="dropdown-item" href="#">Workstream</a>
									<a class="dropdown-item" href="#">Freelancing Activity</a>
                                    <a class="dropdown-item" href="#">Buyer Activity</a>
                                    <a class="dropdown-item" href="#">Contact Us</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Logout</a>
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