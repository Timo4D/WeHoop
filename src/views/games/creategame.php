<?php require __DIR__ . "./../../../elements/html/header.php" ?>

<?php require __DIR__ . "./../../../elements/navbar.php" ?>

<h1>Ausgaben</h1>
<ul>
    <li> <?php echo $gameid?> </li>
    <li>Sobald Spieler 2 das Spiel betreten hat, klicke weiter</li>
</ul>

<a href="submittgame?gameid=<?php echo $gameid?>"><button type="button" class="btn btn-primary">Weiter</button></a>


<?php require __DIR__ . "./../../../elements/html/footer.php" ?>
