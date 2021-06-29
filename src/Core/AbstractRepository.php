<?php

namespace App\Core;
use PDO;

abstract class AbstractRepository {


    protected $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }


    abstract function getTableName();
    abstract function getModel();
    abstract function getColumnID();
    abstract function getColumnUSERNAME();
    abstract function getColumnUSERID();

    // Holt alle EInträge aus der DB
    function fetchAll(){

        $table = $this->getTableName();
        $model = $this->getModel();
        $statement = $this->pdo->query("SELECT * FROM `$table`");
        $posts = $statement->fetchAll(PDO::FETCH_CLASS, $model);

        return $posts;
    }

    // Holt aeinen bestimmten EIntrag aus der DB
    function fetchOne( $id){

        $table = $this->getTableName();
        $model = $this->getModel();
        $column = $this->getColumnID();
        $statement = $this->pdo->prepare("SELECT * FROM `$table` WHERE $column  = :id ");
        $statement->execute(['id' => $id]);
        $statement->setFetchMode(PDO::FETCH_CLASS, $model);
        $post = $statement->fetch(PDO::FETCH_CLASS);

        return $post;


//    return $pdo->query("SELECT * FROM `posts` WHERE title = '{$title}'");
    }


    function fetchAllBy($id)
    {

        $table = $this->getTableName();
        $model = $this->getModel();
        $column = $this->getColumnID();
        $statement = $this->pdo->prepare("SELECT * FROM `$table` WHERE $column  = :id ");
        $statement->execute(['id' => $id]);

        $statement->setFetchMode(PDO::FETCH_CLASS, $model);
        $comments = $statement->fetchAll(PDO::FETCH_CLASS);

        return $comments;

    }


    function fetchAllByUSERNAME( $username)
    {

        $table = $this->getTableName();
        $model = $this->getModel();
        $column = $this->getColumnUSERNAME();
        $statement = $this->pdo->prepare("SELECT * FROM `$table` WHERE $column  = :username ");
        $statement->execute(['username' => $username]);

        $statement->setFetchMode(PDO::FETCH_CLASS, $model);
        $user = $statement->fetch(PDO::FETCH_CLASS);

        return $user;

    }


    function fetchAllByUSERID($userid)
    {

        $table = $this->getTableName();
        $model = $this->getModel();
        $column = $this->getColumnUSERID();
        $statement = $this->pdo->prepare("SELECT * FROM `$table` WHERE $column  = :userid");
        $statement->execute(['userid' => $userid]);

        $statement->setFetchMode(PDO::FETCH_CLASS, $model);
        $user = $statement->fetch(PDO::FETCH_CLASS);

        return $user;

    }

}