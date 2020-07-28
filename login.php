<?php
include_once 'template/header.php';
?>

<div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 login-page">
                <div class="login-form">
                    <h3>Log in to Admin Panel</h3>
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
                    <a href="#" class="fgot-pass">Forget Your Password?</a>
                </div>

            </div>
        </div>
    </div>

<?php
include_once 'template/footer.php';
?>