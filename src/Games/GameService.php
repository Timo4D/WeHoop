<?php

namespace App\Games;

class GameService{

    public function __construct(GameRepository $gameRepository) {
        $this->gameRepository = $gameRepository;
    }

    public function validateGame($gameID, $userID, $score1, $score2) {
        $game = $this->gameRepository->fetchOne($gameID);

        //SENDET DIE ERGEBNISSE AN DIE DB 
        if($game->player1 == $userID) {
            $this->gameRepository->setScoreByPlayer1($gameID, $score1, $score2);
        } else if($game->player2 == $userID) {
            $this->gameRepository->setScoreByPlayer2($gameID, $score1, $score2);
        } else {
            echo "Die Spieler Stimmen nicht überein";
            return false;
        }

        //WENN DIE ERGEBNISSE ÜBERINSTIMMEN WIRD DAS SPIEL VALIDIRT
        
        $game = $this->gameRepository->fetchOne($gameID);

        if($game->score1_1 == $game->score2_1 AND $game->score1_2 == $game->score2_2) {
            $this->gameRepository->verifyGame($gameID);
        }
    }

}