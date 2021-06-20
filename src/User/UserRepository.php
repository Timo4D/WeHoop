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


}