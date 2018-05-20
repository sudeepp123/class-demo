<?php

namespace app\db;

class MysqlDb{
    private $conn=null;
    private $stmt=null;

    public function connect(){
        $this->conn=new \Mysqli('localhost','root','admin','php18002_hr');
    }

    public function query($sql){
        $this->stmt=$this->conn->prepare($sql);
        return $this->stmt;
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function getResult(){
        return $this->stmt->get_result();
    }

    public function close(){
        $this->conn->close();
    }
}
