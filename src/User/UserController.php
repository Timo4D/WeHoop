<?php

namespace App\User;

use App\Core\AbstractController;


class UserController extends AbstractController {

    public function __construct(LoginService  $loginService) {
        $this->loginService = $loginService;
    }

    public function register(){

        $notice = null;
        if (!empty($_POST['username']) AND !empty($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $pwhash = password_hash($password, PASSWORD_DEFAULT);


            if ($this->loginService->attemptRegister($username, $pwhash)){
                header("Location: login");
                return;
            }else {
                $notice = "Dieser User existiert berreits";
            }

        }

        $this->render("user/register", [

            'notice' => $notice

        ]);
    }


    public function dashboard(){
        if ($this->loginService->checklogin()){


            $this->render("dashboard/main", [

            ]);
        }
    }


    public function logout(){
        $this->loginService->logout();
        header("Location: login");
    }



    public function login(){

        $notice = null;
        if (!empty($_POST['username']) AND !empty($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->loginService->attemptLogin($username, $password)){
                header("Location: index/home");
                return;
            }else {
                $notice = "Username und Passwort stimmen nicht überein";
            }
        }

        $this->render("user/loginuser", [
            'notice' => $notice
        ]);
    }

}
