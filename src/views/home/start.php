<?php require "elements/html/header.php" ?>
    <!--********************************************-->
    <!-- START NAVBAR -->
    <!--********************************************-->
<?php require "elements/navbar.php" ?>
    <!--********************************************-->
    <!-- END NAVBAR -->
    <!--********************************************-->
    <br>
    <br>
    <div class="container">
        <h1>WILLKOMMEN BEI WEHOOP</h1>

        <h4>Hallo <?php echo $username ?>, dein Elo ist <?php echo $elo?> </h4>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <div class="card border-primary">
                    <div class="card-header bg-primary"><h5>Gamecreator</h5></div>
                    <div class="card-body">
                        <p class="card-text">Erstelle hier deine eigenen Spiele</p>
                        <a href="/WeHoop/index/creategame" class="btn btn-primary">Los gehts!</a>
                        <a href="/WeHoop/index/searchgame" class="btn btn-primary">Spiel beitreten</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <di class="card">
                    <div class="card-header"><h5>Wurftrainer</h5></div>
                    <div class="card-body">
                        <p class="card-text">Hier kannst du Trainieren</p>
                        <a href="/UdemyBlog/index/creategame" class="btn btn-primary">Los gehts!</a>
                    </div>
                </di>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <hr>
    <div class="container">
        <form method="POST">
            <div class="row">
                <div class="mb-3">
                    <label for="reportABug" class="form-label">Report a Bug</label>
                    <textarea class="form-control" id="reportABug" name="reportABug" rows="3"></textarea>
                    <br>
                    <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                    <p><?php echo $notice ?></p>
                </div>
            </div> 
        </form>

    </div>



<?php require "elements/html/footer.php" ?>