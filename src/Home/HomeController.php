<?php

namespace App\Home;

use App\Core\AbstractController;

class HomeController extends AbstractController {

    public function __construct(HomeRepository $homeRepository){
        $this->homeRepository = $homeRepository;
    }



    public function showStart(){

        $this->render("home/start", [

        ]);
    }

}
