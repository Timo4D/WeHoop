<?php

namespace App\User;

class LoginService {

    public function __construct(
        UserRepository $userRepository){
        $this->userRepository= $userRepository;
    }


    public function logout(){
        unset($_SESSION['username']);
        session_regenerate_id(true);
    }


    public function checklogin(){
        if (isset($_SESSION['username'])){
            return true;
        }else {
            header("Location: login");
            return false;
        }
    }


    public function attemptRegister($username, $password){

        $newuser = $this->userRepository->fetchAllByUSERNAME($username);
        if(empty($newuser)){
            $this->userRepository->insertNewUser($username,$password);
            return true;
        }else {
            return false;
        }
    }


    public function attemptLogin($username, $password){

        $user = $this->userRepository->fetchAllByUSERNAME($username);
        if (empty($user)){
            return false;
        }

        if (password_verify($password, $user->password)){
            $_SESSION['username'] = $user->username;
            session_regenerate_id(true);
            return true;
        } else {
            return false;
        }
    }

}
