<?php


namespace App\Games;

use App\Core\AbstractModel;

class GameModel extends AbstractModel {

    public $gameid;
    public $player1;
    public $player2;
    public $score1_1;
    public $score1_2;
    public $score2_1;
    public $score2_2;
    public $accepted;
    public $verifyed;
}