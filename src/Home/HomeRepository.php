<?php

namespace App\Home;
use App\Core\AbstractRepository;

class HomeRepository extends AbstractRepository {

    public function getTableName(){
        //return "posts";
        //TODO: Bei bedarf DB Tabelle festlegen
    }

    public function getModel(){
        return HomeModel::class;
    }

    public function getColumnID(){
        //TODO: Bei Bedarf Spalte anlegen
    }

    public function getColumnUSERNAME(){
        return "username";
    }

    public function getColumnUSERID(){
        return "userid";
    }
}
