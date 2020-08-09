<?php
include 'template/header.php';
//include 'connect.php';

$con= mysqli_connect("localhost","root","","ework");

if(isset($_POST['sub'])){
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];
$password = $_POST['password'];
$hasshedpass = sha1($password);

 
 
$stmt="INSERT INTO user(fullname,username,password,email,phone)values('$fullname','$username','$hasshedpass','$email','$phone')";
if(mysqli_query($con, $stmt)){
echo "inserted successfully..!";
}
}
?>




<section>
        <div class="container register">
        <div class="row">
        <div class="col-md-3 register-left">
        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
        <h3>Welcome to <br>E-Work</h3>
        <a href="index.php"><input type="submit" name="" value="Login"/><br/></a>
        </div>
        <div class="col-md-9 register-right">
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h1 class="register-heading">Register</h1>
            <div class="row register-form">
                <div class="col-md-6">
                <form method="POST">
                    <div class="form-group">
                        <input type="text" name="fullname" class="form-control" placeholder="Full Name *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password *" value="" />
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control"  placeholder="Confirm Password *" value="" />
                    </div>

                </div>
                <!-- <input class="form-control" name="avater" required="required" type="file"> -->

                    
                    <input type="submit" name="sub" class="btnRegister"  value="Register"/>
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>

        </div>
</section>

<?php
include 'template/footer.php';
?>