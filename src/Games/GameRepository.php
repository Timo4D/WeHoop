<?php

namespace App\Games;

use App\Core\AbstractRepository;

class GameRepository extends AbstractRepository{


    function getTableName()
    {
        return "games";
    }

    function getModel()
    {
        return GameModel::class;
    }

    function getColumnID()
    {
        return "gameid";
    }

    function getColumnUSERNAME()
    {
        // TODO: Implement getColumnUSERNAME() method.
    }

    function getColumnUSERID()
    {
        return "userid";
    }

    public function insertNewGame($player1){
        $table = $this->getTableName();
        $statement = $this->pdo->prepare("INSERT INTO `$table` ( `player1`) VALUES (:player1);");
        $statement->execute([
            'player1' => $player1
        ]);
    }

    public function playerJoined($player2, $gameid) {
        $table = $this->getTableName();
        $statement = $this->pdo->prepare("UPDATE `$table` SET `player2` = '$player2' WHERE `games`.`gameid` = :gameid;");
        $statement->execute([
            'gameid' => $gameid
        ]);
    }

    public function verifyGame($gameid) {
        $table = $this->getTableName();
        $statement = $this->pdo->prepare("UPDATE `$table` SET `verified` = '1' WHERE `games`.`gameid` = :gameid;");
        $statement->execute([
            'gameid' => $gameid
        ]);
    }

    public function acceptGame($gameid) {
        $table = $this->getTableName();
        $statement = $this->pdo->prepare("UPDATE `$table` SET `accepted` = '1' WHERE `games`.`gameid` = :gameid;");
        $statement->execute([
            'gameid' => $gameid
        ]);
    }

    public function setScoreByPlayer1($gameid, $score1, $score2) {
        $table = $this->getTableName();
        $statement = $this->pdo->prepare("UPDATE `$table` SET `score1_1` = '$score1', `score1_2` = '$score2' WHERE `games`.`gameid` = :gameid;");
        $statement->execute([
            'gameid' => $gameid
        ]);
    }

    public function setScoreByPlayer2($gameid, $score1, $score2) {
        $table = $this->getTableName();
        $statement = $this->pdo->prepare("UPDATE `$table` SET `score2_1` = '$score1', `score2_2` = '$score2' WHERE `games`.`gameid` = :gameid;");
        $statement->execute([
            'gameid' => $gameid
        ]);
    }

}