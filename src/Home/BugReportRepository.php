<?php

namespace App\Home;

use App\Core\AbstractRepository;

class BugReportRepository extends AbstractRepository {

    public function getTableName(){
        return "bugreports";
    }

    public function getModel(){
        return BugReportModel::class;
    }

    public function getColumnID(){
        return "reportid";
    }

    public function getColumnUSERNAME(){
        return "username";
    }

    public function getColumnUSERID(){
        return "userid";
    }

    public function submitReport($text) {
        $table = $this->getTableName();
        $username = $_SESSION['username'];
        $statement = $this->pdo->prepare("INSERT INTO `$table` (`username`, `text`) VALUES ('$username', '$text');");
        $statement->execute([

        ]);
    }

}