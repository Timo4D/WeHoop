<?php

namespace App\Home;

use App\Core\AbstractController;
use App\User\UserRepository;

class HomeController extends AbstractController {

    public function __construct(HomeRepository $homeRepository, UserRepository $userRepository){
        $this->homeRepository = $homeRepository;
        $this->userRepository = $userRepository;
    }



    public function showStart(){

        $username = $_SESSION['username'];
        $elo = $this->userRepository->fetchAllByUSERNAME($username)->elo;

        $this->render("home/start", [
            'username' => $username,
            'elo' => $elo
        ]);
    }

}
