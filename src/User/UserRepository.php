<?php

namespace App\User;

use App\Core\AbstractRepository;

class UserRepository extends AbstractRepository {

    public function getTableName(){
        return "user";
    }

    public function getModel(){
        return UserModel::class;
    }

    public function getColumnID(){
        return "userid";
    }

    public function getColumnUSERNAME(){
        return "username";
    }

    public function getColumnUSERID(){
        return "userid";
    }


    public function insertNewUser($username, $password){
        $table = $this->getTableName();
        $statement = $this->pdo->prepare("INSERT INTO `$table` ( `username`, `password`) VALUES (:username, :password);");
        $statement->execute([
            'username' => $username,
            'password' => $password
        ]);
    }

    public function updateElo($userID, $newElo) {
        $table = $this->getTableName();
        $statement = $this->pdo->prepare("UPDATE `$table` SET `elo` = '$newElo' WHERE `user`.`userid` = :userID;");
        $statement->execute([
            'userID' => $userID
        ]);
    }

    public function updateProfilePic($userID, $file_name) {
        $table = $this->getTableName();
        $statement = $this->pdo->prepare("UPDATE `$table` SET `profile_pic` = '$file_name' WHERE `user`.`userid` = :userID;");
        $statement->execute([
            'userID' => $userID
        ]);
    }

}