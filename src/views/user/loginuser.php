<?php require __DIR__ . "./../../../elements/html/header.php" ?>
<!--********************************************-->
<!-- START NAVBAR -->
<!--********************************************-->
<?php require __DIR__ . "./../../../elements/navbar.php" ?>
<!--********************************************-->
<!-- END NAVBAR -->
<!--********************************************-->
<br>
<br>
<br>
<br>
<br>
<div class="container row d-flex justify-content-center">
</div>


<div class="container container-register">
    <div class="row d-flex justify-content-center">
        <form method="post" class="col-6 container-register-bg" action="">
            <div class="branded-logo-container">
                <img class="img-fluid" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg">
                <?php //var_dump($_POST)?>
            </div>
            <br>
            <div class=" title-login-container-account">
                <h3 class="title-login-account">Login to your Account</h3>
                <h6 class="register-notice">Du hast noch keinen Account? <a href="/WeHoop/index/register">Hier Registrieren</a></h6>
            </div>
            <br>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text"
                       class="form-control"
                       id="username"
                       aria-describedby="usernameHelp"
                       placeholder="Enter your Username"
                       name="username">


                <small id="emailHelp" class="form-text text-muted">Login with your Email</small>
            </div>
            <br>
            <div class="form-group">
                <label for="user-password">Enter Password</label>
                <input type="password"
                       class="form-control"
                       id="user-password"
                       placeholder="Password"
                       name="password">
                <small id="emailHelp" class="form-text text-muted">Login with your Email</small>
            </div>
            <br>
            <div class="text-right">
                <div class="submit-button-container">
                    <button type="submit"
                            class="btn btn-primary login-button"
                            value="send"
                            name="loginbutton">Login</button>
                </div>
                <div class="notice">
                    <p> <?php echo $notice ?></p>
                    <br>
                    <br>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require __DIR__ . "./../../../elements/html/footer.php" ?>
