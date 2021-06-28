<?php require __DIR__ . "./../../../elements/html/header.php" ?>

<?php require __DIR__ . "./../../../elements/navbar.php" ?>



<?php
echo $gameid;
?>

<h1>Bitte den Endscore eingeben:</h1>
<h6>Es wird bis 21 gespielt</h6>

<br>
<br>

<form method="post">
  <div class="mb-3">
    <label for="score1" class="form-label"><?php echo $player1 ?></label>
    <input type="number" class="form-control" id="score1" name="score1">
  </div>
  <div class="mb-3">
    <label for="score2" class="form-label"><?php echo $player2 ?></label>
    <input type="number" class="form-control" id="score2" name="score2">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<p><?php echo $notice ?></p>


<?php require __DIR__ . "./../../../elements/html/footer.php" ?>
