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

                if (!empty($rows)){

                
            ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h1 class="text-center">Manage Member's</h1>
			</div>
			<div class="table-responsive">
				<table class="main-table table table-bordered text-center">
					<tr>
						<td>#ID</td>
						<td>Avater</td>
						<td>Username</td>
						<td>Email</td>
						<td>Full Name</td>
						<td>Registration Date</td>
						<td>Control</td>
					</tr><?php
					                            foreach ($rows as $row) {
					                                echo "<tr>";
					                                    echo "<td>" . $row['id'] . "</td>";
					                                    echo "<td><img src='uploads/avater/" . $row['avater'] . "' alt='' class='avater-img'/></td>";
					                                    echo "<td>" . $row['username'] . "</td>";
					                                    echo "<td>" . $row['email'] . "</td>";
					                                    echo "<td>" . $row['fullname'] . "</td>";
					                                    echo "<td>" . $row['Date']  . "</td>";
					                                    echo "<td> 
					                                        <a href='members.php?do=Edit&id=" . $row['id'] ."' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
					                                        <a href='members.php?do=Delete&id=" . $row['id'] ."' class='btn btn-danger confirm'><i class='fa fa-close'></i>  Delete</a>";

					                                            if($row['regstatus'] == 0){

					                                    echo "<a href='members.php?do=Activate&id=" . $row['id'] ."' class='btn btn-info confirm'><i class='fa fa-check'></i>  Activate</a>";

					                                            }

					                                        echo "</td>";
					                                echo "</tr>";
					                            }
					                        ?>
				</table>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<a class="btn btn-primary" href="members.php?do=Add"><i class="fa fa-plus"></i> Add New Member</a>
		</div>
	</div>

	

	<?php 
	                    } else{
	                        echo '<div class="container">';
	                            echo '<div class="alert alert-info">There\'s No Record To Show.</div>';
	                            echo "<a class='btn btn-primary' href='members.php?do=Add'><i class='fa fa-plus'></i> Add New Member</a>";
	                        echo '</div>';
	                    }
	                }


	                elseif( $do == 'Add' ){ // Add New Member's Page
	                ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3 add-member">
				<h1 class="text-center">Add New Member</h1>
				<form action="?do=Insert" enctype="multipart/form-data" method="post">
					<input name="id" type="hidden" value="<?php echo $id; ?>"> <!-- Start Username Field -->
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Username</label>
						<div class="col-lg-9">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div><input autocomplete="off" class="form-control" name="username" placeholder="Your Username" required="required" type="text">
							</div>
						</div>
					</div><!-- End Username Field -->
					<!-- Start Password Field -->
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Password</label>
						<div class="col-lg-9">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div><input autocomplete="New Password" class="password form-control" name="password" placeholder="Your Password" required="required" type="password">
							</div><!--i class="show-pass fa fa-eye"></i-->
						</div>
					</div><!-- End Password Field -->
					<!-- Start Full Name Field -->
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Full Name</label>
						<div class="col-lg-9">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-hand-o-right"></i>
								</div><input autocomplete="off" class="form-control" name="fullname" placeholder="Your fullname" required="required" type="text">
							</div>
						</div>
					</div><!-- End Full Name Field -->
					<!-- Start Email Address Field -->
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Email Address</label>
						<div class="col-lg-9">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-envelope-o"></i>
								</div><input autocomplete="off" class="form-control" name="email" placeholder="Email Address" required="required" type="email">
							</div>
						</div>
					</div><!-- End Email Address Field -->
					<!-- Start User Avater Field -->
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">User Avater <br><span>(Max size 4MB)</span></label>
						<div class="col-lg-9">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div><input class="form-control" name="avater" required="required" type="file">
							</div>
						</div>
					</div><!-- End User Avater Field -->
					<div class="form-group row">
						<div class="col-lg-9 offset-lg-3">
							<input class="btn btn-outline-success add-member-btn" type="submit" value="Register">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div><?php
	                } 


	                elseif( $do == 'Insert'){
	                //echo $_POST['username'] . $_POST['password'] . $_POST['fullname'] . $_POST['email']; 
	                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	                    echo '<h1>Welcome New Member</h1>';
	                    echo '<div class="container">';
	                    // Upload Variables 

	                    $avater = $_FILES['avater'];

	                    // Upload Variables

	                    $avaterName = $_FILES['avater']['name'];
	                    $avaterSize = $_FILES['avater']['size'];
	                    $avaterTem  = $_FILES['avater']['tmp_name'];
	                    $avaterType = $_FILES['avater']['type'];

	                    // List Of Allowed File Type to Upload

	                    $avaterAllowedExtension = array("jpeg", "jpg", "png", "gif");

	                    // Get Avater Extension 

	                    $avaterExtension = strtolower(end (explode ('.', $avaterName)));

	                    // Get Variables from the Form

	                    $user = $_POST['username'];
	                    $pass = $_POST['password'];
	                    $email = $_POST['email'];
	                    $fullname = $_POST['fullname'];
	                    $hassedPass = sha1($_POST['password']);

	                    
	                    // Validate The Form
	                    $formErrors = array();
	                    if (strlen($user) < 4){
	                        $formErrors[] = '<div class="alert alert-danger">Username Can\'t be Less then <strong>4 Charecter</strong></div>';
	                    }
	                    if (strlen($user) > 15){
	                        $formErrors[] = '<div class="alert alert-danger">Username Can\'t be Bigger then <strong>15 Charecter</strong></div>';
	                    }
	                    if (empty($pass)){
	                        $formErrors[] = 'Password Can\'t be empty';
	                    }
	                    if (empty($email)){
	                        $formErrors[] = 'Email Can\'t be empty';
	                    }
	                    if (empty($fullname)){
	                        $formErrors[] = 'Full Name Can\'t be empty';
	                    }
	                    if ( !empty($avaterName) && ! in_array($avaterExtension, $avaterAllowedExtension) ){
	                        $formErrors[] = 'Image Expension Type Is Not Allowed';
	                    }
	                    if ( empty($avaterName) ){
	                        $formErrors[] = 'Avater Is <strong>Required</strong>';
	                    }
	                    if ( !empty($avaterSize > 4194304 ) ){
	                        $formErrors[] = 'Avater Cant Be Larger Then <strong>4MB</strong>';
	                    }

	                    // Loop Into The Errors inside The array
	                    foreach($formErrors as $error){
	                        echo '<div class="alert alert-danger">' . $error .  '</div>';
	                    }

	                    // Check if there's No Error Proceed The Update Operation
	                    if (empty($formErrors)){

	                        $avater = rand(0, 100000) . '_' . $avaterName;

	                        move_uploaded_file($avaterTem, "uploads\avater\\" . $avater );

	                        
	                        // Check Userinfo Exist In Database
	                        $check = checkItem( "username", "admin", $user );

	                        if ($check == 1 ){

	                            $theMsg = '<div class="alert alert-danger">Sorry! user already Exist</div>';
	                            redirectHome($theMsg, 'back');

	                        }else{

	                            // Insert New Member's Info Into The Database
	                            $statement = $con->prepare("INSERT INTO admin(username, password, email, fullname, regstatus, Date, avater) VALUES(:zuser, :zpass, :zemail, :zname, 0, now(), :zavater) ");

	                            $statement->execute(array(
	                                'zuser'     => $user, 
	                                'zpass'     => $hassedPass, 
	                                'zemail'    => $email, 
	                                'zname'     => $fullname,
	                                'zavater'   => $avater
	                            ));
	                            
	                            // Echo Success Message
	                            $theMsg =  "<div class='alert alert-success'>" . $statement->rowCount() . ' Record Updated</div>';

	                            redirectHome($theMsg, 'back', 3);
	                            
	                        } 
	                    }
	                }else{
	                    echo "<div class='container'>";
	                    $theMsg = '<div class="alert alert-danger">SORRY, You cant Browse This Page</div>';

	                    /* Redirect On HomePage for Error Message */
	                    redirectHome($theMsg, 'back', 3);
	                    echo "</div>";
	                }
	                echo "</div>";
	            }


	            elseif( $do == 'Edit' ){  
	            //Member's Profile Edit Page  
	            // condition ? true : false 
	            // Check if the get request is Numeric & Get the Integer Value of It
	            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
	            // Select All Data Depend On This ID
	            $statement = $con -> prepare("SELECT * FROM admin WHERE id = ? LIMIT 1");
	            // Execute Query
	            $statement -> execute(array($id));
	            // Fetch The Data
	            $row = $statement -> fetch();
	            // The Row Count
	            $count = $statement -> rowCount();
	            // If There is ID found
	            if ($count > 0){ ?>
	<div class="container">
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
														admin 
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
	                            $statement = $con-> prepare("UPDATE admin SET username = ?, password = ?, email = ?, fullname = ? WHERE id = ?");
	                            $statement->execute(array($user, $pass, $email, $fullname, $id));
	                            // Echo Success Message
	                            $theMsg = "<div class='alert alert-success'>" . $statement->rowCount() . ' Record Updated</div>';
	                            /* Redirect On HomePage for Error Message */
	                            
	                            redirectHome($theMsg, 'back',5);
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
	                    $check = checkItem ('id', 'admin', $id);
	                    
	                    if ( $check > 0){ 

	                        $statement = $con->prepare("DELETE FROM admin WHERE id = :zuser");

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
	                    $check = checkItem ('id', 'admin', $id);
	                    
	                    if ( $check > 0){ 

	                        $statement = $con->prepare("UPDATE admin SET regstatus = 1 WHERE id = ?");

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