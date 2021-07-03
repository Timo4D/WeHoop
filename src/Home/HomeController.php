<?php

namespace App\Home;

use App\Core\AbstractController;
use App\User\UserRepository;

class HomeController extends AbstractController {

    public function __construct(HomeRepository $homeRepository, UserRepository $userRepository, BugReportRepository $bugReportRepository){
        $this->homeRepository = $homeRepository;
        $this->userRepository = $userRepository;
        $this->bugReportRepository = $bugReportRepository;
    }



    public function showStart(){

        $username = $_SESSION['username'];
        $elo = $this->userRepository->fetchAllByUSERNAME($username)->elo;
        $notice = null;

        if(!empty($_POST['reportABug'])) {
            $text = $_POST['reportABug'];
            $this->bugReportRepository->submitReport($text); 
            $notice = "Danke für das Feedback";
        }

        $this->render("home/start", [
            'username' => $username,
            'elo' => $elo,
            'notice' => $notice
        ]);
    }

}
