<?php require "elements/html/header.php" ?>

<?php require "elements/navbar.php" ?>

<div class="container">
    <div class="main-body">
        <br>
        <br>
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?php echo $target_file ?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                    <h4><?php echo $username ?></h4>
                    <p class="text-secondary mb-1">Der beste Spieler</p>
                    <p class="text-muted font-size-sm">Rems-Murr-Kreis</p>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                    <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $username ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                    <h6 class="mb-0">Elo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $elo ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                    <h6 class="mb-0">Lieblingscourt</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    Gera
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                    <h6 class="mb-0">Wohnort</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    Winterbach
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                    <h6 class="mb-0">Bio</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    Jo, ich bin cool
                    </div>
                </div>
                </div>
            </div>   
                <div class="col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                    <h6 class="d-flex align-items-center mb-3">Skills</h6>
                    <small>Shooting</small>
                    <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small>Zone</small>
                    <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small>Playmaking</small>
                    <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small>Defense</small>
                    <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    </div>
                </div>
                </div>
            </div>



            </div>
        </div>

        </div>
    </div>

<form action="uploadProfilePic" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>


<?php require "elements/html/footer.php" ?>