<?php

namespace App\User;

use Exception;

class EloService{
    
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function applyElo($playerAID, $playerBID, $winnerID) {
        $k = 32;

        $playerA = $this->userRepository->fetchAllByUSERID($playerAID);
        $playerB = $this->userRepository->fetchAllByUSERID($playerBID);
        $eloA = $playerA->elo;
        $eloB = $playerB->elo;

        $EA = $this->EA($playerAID, $playerBID);
        $EB = $this->EB($playerAID, $playerBID);

        if($playerAID == $winnerID) {
            
            $newEloA = $eloA + ($k*(1 - $this->EA($playerAID, $playerBID)));
            $newEloB = $eloB + ($k*(0 - $this->EB($playerAID, $playerBID)));

        } else if($playerBID == $winnerID) {
            
            $newEloA = $eloA + ($k*(0 - $this->EA($playerAID, $playerBID)));
            $newEloB = $eloB + ($k*(1 - $this->EB($playerAID, $playerBID)));

        } else{
            throw new Exception("Could not apply ELO");
        }

        $this->userRepository->updateElo($playerAID, $newEloA);
        $this->userRepository->updateElo($playerBID, $newEloB);

    }

    //Erwartungswert der Spieler
    private function EA($playerA, $playerB) {
        $playerA = $this->userRepository->fetchAllByUSERID($playerA);
        $playerB = $this->userRepository->fetchAllByUSERID($playerB);

        $eloA = $playerA->elo;
        $eloB = $playerB->elo;

        $exponent = ($eloB - $eloA)/400;

        $EA = 1/(1+pow(10, $exponent));

        return $EA;
    }

    private function EB($playerAID, $playerBID) {
        $playerA = $this->userRepository->fetchAllByUSERID($playerAID);
        $playerB = $this->userRepository->fetchAllByUSERID($playerBID);
        $eloA = $playerA->elo;
        $eloB = $playerB->elo;

        $exponent = ($eloA - $eloB)/400;

        $EB = 1/(1+pow(10, $exponent));
        
        return $EB;
    }

}