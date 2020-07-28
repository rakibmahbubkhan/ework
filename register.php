<?php
include_once 'template/header.php';
?>
<section>
        <div class="container register">
        <div class="row">
        <div class="col-md-3 register-left">
        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
        <h3>Welcome to <br>E-Work</h3>
        <a href="login.php"><input type="submit" name="" value="Login"/><br/></a>
        </div>
        <div class="col-md-9 register-right">
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h1 class="register-heading">Register</h1>
            <div class="row register-form">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password *" value="" />
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control"  placeholder="Confirm Password *" value="" />
                    </div>
                    <input type="submit" class="btnRegister"  value="Register"/>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>

        </div>
</section>

<?php
include_once 'template/footer.php';
?>