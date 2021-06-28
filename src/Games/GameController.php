<?php

namespace App\Games;

use App\Core\AbstractController;
use App\User\UserRepository;

class GameController extends AbstractController{

    public function __construct(GameRepository $gameRepository, UserRepository $userRepository, GameService $gameService) {
        $this->gameRepository = $gameRepository;
        $this->userRepository = $userRepository;
        $this->gameService = $gameService;
    }


    public function creategame() {

        $playerID = $this->userRepository->fetchAllByUSERNAME($_SESSION['username'])->userid;

        $this->gameRepository->insertNewGame($playerID);
        $game = max($this->gameRepository->fetchAll());
        echo $game->gameid;


        $this->render("games/creategame", [
            'gameid' => $game->gameid
        ]);

    }

    public function searchgame() {

        $playerID = $this->userRepository->fetchAllByUSERNAME($_SESSION['username'])->userid;

        $this->render("games/searchgame", [

        ]);

    }

    public function joinGame() {
        $playerID = $this->userRepository->fetchAllByUSERNAME($_SESSION['username'])->userid;
        $gameID = $_POST['gameid'];

        header("Location: submittgame?gameid=$gameID");

        $this->gameRepository->playerJoined($playerID, $gameID);
        $this->gameRepository->acceptGame($gameID);
    }

    public function submittgame() {
        $notice = null;
        $gameid = $_GET['gameid'];
        $game = $this->gameRepository->fetchOne($gameid);
        $userid = $this->userRepository->fetchAllByUSERNAME($_SESSION['username'])->userid;

        $player1 = $this->userRepository->fetchAllByUserID($game->player1)->username;
        $player2 = $this->userRepository->fetchAllByUserID($game->player2)->username;

        if($player1 != $player2) {
            if(!empty($_POST['score1']) AND !empty($_POST['score2'])) {
                if($_POST['score1']<=21 OR $_POST['score2']<=21) {
                    if($_POST['score1']==21 xor $_POST['score2'] == 21) {
                        $this->gameService->validateGame($gameid, $userid, $_POST['score1'], $_POST['score2']);
                        header("Location: home");
                    } else {
                        $notice = "Bitte Spielt bis 21 / Es können gibt kein unentschiden";
                    }
                } else {
                    $notice = "Das Spiel geht nur bis 21";
                }
            } else {
                $notice = "Bitte gebe ergebnisse ein";
            }
        } else {
            $notice = "Du kannst nich gegen dich selbst Spielen!";
        }



        $this->render("games/submittgame", [
            'gameid' => $game->gameid,
            'player1' => $player1,
            'player2' => $player2,
            'notice' => $notice
        ]);
    }
}