<?php

namespace App\User;

use App\Core\AbstractController;


class UserController extends AbstractController {

    public function __construct(LoginService  $loginService, UserRepository $userRepository) {
        $this->loginService = $loginService;
        $this->userRepository = $userRepository;
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
                header("Location: home");
                return;
            }else {
                $notice = "Username und Passwort stimmen nicht überein";
            }
        }

        $this->render("user/loginuser", [
            'notice' => $notice
        ]);
    }

    public function uploadProfilePic() {

        $target_dir = "src/User/profile_pics/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $this->userRepository->updateProfilePic($this->userRepository->fetchAllByUSERNAME($_SESSION['username'])->userid, $_FILES["fileToUpload"]["name"]);

        $this->render("user/uploadedProfilePic", [
            'target_file' => $target_file
        ]);

    }

    public function Profile() {

        $user = $this->userRepository->fetchAllByUSERNAME($_SESSION['username']);
        $target_name = $user->profile_pic;
        $target_file = "src/User/profile_pics/".$target_name;

        $username = $_SESSION['username'];

        $elo = $user->elo;


        $this->render("user/profile", [
            'target_file' => $target_file,
            'username' => $username,
            'elo' => $elo
        ]);
    }

}
