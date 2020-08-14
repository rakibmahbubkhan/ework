<?php
ob_start();
session_start();
include_once 'template/header.php';

if (isset($_SESSION['username'])) {
	header('location:dashboard.php');
}

include 'admin/connect.php';

//check if user coming from HTTP request

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$hasshedpass = sha1($password);

	//echo "<h3>Hello ".$username." "."Your Password Is '".$hasshedpass."'</h3>" ;

	$statement = $con -> prepare("SELECT id, username, password FROM user WHERE username = ? AND password = ?");
	$statement -> execute(array($username,$hasshedpass));
    $row = $statement -> fetch();
	$count = $statement -> rowCount();
	//echo $count;
	if ($count > 0) {
        //print_r($row);
		$_SESSION['username'] = $username;
        $_SESSION['ID'] = $row['id'];
		header('location:dashboard.php');
		exit();
	}
}
?>

<div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 login-page">
                <div class="login-form">
                    <h3>Log in to E-Work</h3>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fas fa-user"></i>
                                </div>
                                <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" required="required" />
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Your Password" autocomplete="" required="required" />
                            </div>                          
                        </div>
                        
                        <div >
                            <button type="submit" class="btn btn-outline-primary lg-btn">Login</button>
                        </div>
                    </form>
                </div>
                <!-- Forget Password Option -->
                <div class="forget-password">
                    <a href="register.php" class="fgot-pass">Need An Account?</a>
                </div>

            </div>
        </div>
    </div>

<?php
include_once 'template/footer.php';
ob_end_flush();
?>