<?php require __DIR__ . "./../../../elements/html/header.php" ?>
<!--********************************************-->
<!-- START NAVBAR -->
<!--********************************************-->
<?php require __DIR__ . "./../../../elements/navbar.php" ?>
<!--********************************************-->
<!-- END NAVBAR -->
<!--********************************************-->

<!-- Start des Inhalts -->


<br>
<br>
<br>
<br>
<br>
<div class="container container-register">
    <div class="row d-flex justify-content-center">
        <form method="post" class="col-6 container-register-bg" action="">
            <div class="branded-logo-container">
                <img class="img-fluid" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg">
            </div>
            <br>
            <h3 class="title-register-create">Create your free Account</h3>
            <h6 class="register-notice">Du hast bereits einen Account? <a href="/WeHoop/index/login">Hier Einloggen</a></h6>
            <br>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text"
                       class="form-control"
                       id="user-password"
                       placeholder="Username"
                       name="username">
                <small id="emailHelp" class="form-text text-muted">Enter a nice username</small>
            </div>
            <br>
            <div class="form-group">
                <label for="user-password">Password</label>
                <input type="password"
                       class="form-control"
                       id="user-password"
                       placeholder="Password"
                       name="password">
                <small id="emailHelp" class="form-text text-muted">Enter a very strong password</small>
            </div>
            <br>
            <div class="text-right">
                <div class="submit-button-container">
                    <button type="submit"
                            class="btn btn-primary submit-button"
                            name="submitregister"
                            value="send">Register</button>
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

<?php require "elements/html/footer.php" ?>
