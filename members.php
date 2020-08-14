<?php
    // Use This Page For User Profile Update
    session_start();
    $pageTitle = 'Member\'s';
    if (isset($_SESSION['username'])){
            include 'init.php';
            $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

            // Start Manage Page
            if ( $do == 'Manage' ){ // Manage Member's 

            // Manage Pending Member Request 
            $query ='';
            if (isset($GET['page']) && $_GET['page'] == 'Pending' ){
                $query = 'AND regstatus = 0';
            }

                // Select All user Except Admin / Super Admin
                $statement = $con->prepare("SELECT * FROM user WHERE groupid != 1 $query ORDER BY id DESC");
                $statement->execute();
                $rows = $statement->fetchAll();


                
            ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php


	            }


	            elseif( $do == 'Edit' ){  
	            //Member's Profile Edit Page  
	            // condition ? true : false 
	            // Check if the get request is Numeric & Get the Integer Value of It
	            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
	            // Select All Data Depend On This ID
	            $statement = $con -> prepare("SELECT * FROM user WHERE id = ? LIMIT 1");
	            // Execute Query
	            $statement -> execute(array($id));
	            // Fetch The Data
	            $row = $statement -> fetch();
	            // The Row Count
	            $count = $statement -> rowCount();
	            // If There is ID found
	            if ($count > 0){ ?>
	<div class="container top-section">
		<div class="row">
			<div class="col-lg-6 offset-lg-3 edit-profile">
				<h1 class="text-center">Update Your Profile</h1>
				<form action="?do=Update" class="" method="post">
					<input name="id" type="hidden" value="<?php echo $id; ?>"> <!-- Start Username Field -->
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Username</label>
						<div class="col-lg-9">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div><input autocomplete="off" class="form-control" name="username" required="required" type="text" value="<?php echo $row['username']; ?>">
							</div>
						</div>
					</div><!-- End Username Field -->
					<!-- Start Password Field -->
					<div class="form-group row">
						<label class="col-lg-3 control-label">Password</label>
						<div class="col-lg-9">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div><input class="form-control" name="oldPassword" type="hidden" value="<?php echo $row['password']; ?>"> 
									  <input autocomplete="New Password" class="form-control" name="newPassword" type="password">
							</div>
						</div>
					</div><!-- End Password Field -->
					<!-- Start Full Name Field -->
					<div class="form-group row">
						<label class="col-lg-3 control-label">Full Name</label>
						<div class="col-lg-9">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-hand-o-right"></i>
								</div><input autocomplete="off" class="form-control" name="fullname" required="required" type="text" value="<?php echo $row['fullname']; ?>">
							</div>
						</div>
					</div><!-- End Full Name Field -->
					<!-- Start Email Address Field -->
					<div class="form-group row">
						<label class="col-lg-3 control-label">Email Address</label>
						<div class="col-lg-9">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-envelope-o"></i>
								</div><input autocomplete="off" class="form-control" name="email" required="required" type="email" value="<?php echo $row['email']; ?>">
							</div>
						</div>
					</div><!-- End Email Address Field -->
					<div class="form-group row">
						<div class="col-lg-12">
							<input class="btn btn-outline-primary updt-btn" type="submit" value="Update Profile">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div><?php  
	                }
	                // Show the Error
	                else{
	                    header('Location: 404.php');
	                }
	            }
	            elseif( $do == 'Update' ) { // Update Page
	                echo '<h1 class="heading">Update Profile</h1>';
	                echo '<div class="container">';
	                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	                    // Get Variables from the Form
	                    $id = $_POST['id'];
	                    $user = $_POST['username'];
	                    $email = $_POST['email'];
	                    $fullname = $_POST['fullname'];
	                    // Password Tricks
	                    // Condition ? True : False;
	                    $pass = empty($_POST['newPassword']) ? $_POST['oldPassword'] : sha1($_POST['newPassword']);
	                    // Validate The Form
	                    $formErrors = array();
	                    if (strlen($user) < 4){
	                        $formErrors[] = '<div class="alert alert-danger">Username Can\'t be Less then <strong>4 Charecter</strong></div>';
	                    }
	                    if (strlen($user) > 15){
	                        $formErrors[] = '<div class="alert alert-danger">Username Can\'t be Bigger then <strong>15 Charecter</strong></div>';
	                    }
	                    if (empty($user)){
	                        $formErrors[] = '<div class="alert alert-danger">Username Cant be empty</div>';
	                    }
	                    if (empty($email)){
	                        $formErrors[] = '<div class="alert alert-danger">Email Cant be empty</div>';
	                    }
	                    if (empty($fullname)){
	                        $formErrors[] = '<div class="alert alert-danger">Full Name Cant be empty</div>';
	                    }
	                    // Loop Into The Errors inside The array
	                    foreach($formErrors as $error){
	                        echo $error . '<br/>';
	                    }
	                    // Check if there's No Error Proceed The Update Operation
	                    if (empty($formErrors)){
	                            
	                        $statement2 = $con->prepare("SELECT 
	                                                    * 
	                                                FROM 
														user 
	                                                WHERE 
	                                                    username = ? 
	                                                AND 
	                                                    id != ?
	                                                ");

	                        $statement2->execute(array($user, $id));

	                        $count = $statement2->rowCount();

	                        if ($count == 1){
	                            echo '<div class="alert alert-danger">Sorry This User Is Exist</div>';
	                            redirectHome($theMsg, 'back', 3);
	                        }
	                        else{
	                            // Update The Database
	                            $statement = $con-> prepare("UPDATE user SET username = ?, password = ?, email = ?, fullname = ? WHERE id = ?");
	                            $statement->execute(array($user, $pass, $email, $fullname, $id));
	                            // Echo Success Message
	                            $theMsg = "<div class='alert alert-success'>" . $statement->rowCount() . ' Record Updated</div>';
	                            /* Redirect On HomePage for Error Message */
	                            
//	                            redirectHome($theMsg, 'back',5);
	                        }
	                    }
	                }else{
	                    echo "<div class='container'>";
	                    $theMsg = '<div class="alert alert-danger">SORRY, you cant Browse This Page</div>';
	                    redirectHome ($theMsg, 'back', 3);
	                    echo "</div>";
	                }
	                echo "</div>";
	            } 


	            elseif( $do == 'Delete' ){
	                echo "<h1 class='text-center'>Delete Member</h1>";

	                // Delete User with all information
	                $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
	                    // Select All Data Depend On This ID
	                    $check = checkItem ('id', 'user', $id);
	                    
	                    if ( $check > 0){ 

	                        $statement = $con->prepare("DELETE FROM user WHERE id = :zuser");

	                        $statement-> bindParam(":zuser", $id);

	                        $statement->execute();

	                        $theMsg = "<div class='alert alert-success'>" . $statement->rowCount() . "Record Deleted</div>";
	                        redirectHome($theMsg, 'back', 3);
	                    }
	                    else{
	                        echo "<div class='container'>";
	                        $theMsg = '<div class="alert alert-danger">This ID is Not Exist</div>';
	                        redirectHome($theMsg, 'back', 3);    
	                    }
	                    
	                    echo "</div>";
	            }

	            elseif ( $do == 'Activate' ){

	                echo "<h1 class='text-center'>Activate Member</h1>";

	                // Delete User with all information
	                $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
	                    // Select All Data Depend On This ID
	                    $check = checkItem ('id', 'user', $id);
	                    
	                    if ( $check > 0){ 

	                        $statement = $con->prepare("UPDATE user SET regstatus = 1 WHERE id = ?");

	                        $statement->execute(array($id));

	                        $theMsg = "<div class='alert alert-success'>" . $statement->rowCount() . "Record Updated</div>";
	                        redirectHome($theMsg, 'back', 3);
	                    }
	                    else{
	                        echo "<div class='container'>";
	                        $theMsg = '<div class="alert alert-danger">This ID is Not Exist</div>';
	                        redirectHome($theMsg, 'back', 3);
	                        
	                    }
	                    echo "</div>";
	            }

	            include $temp. 'footer.php';
	        }
	        else{
	            header('Location: index.php');
	            exit();
	        }
	    ?>
</body>
</html>