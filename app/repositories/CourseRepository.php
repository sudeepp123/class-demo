<?php

namespace app\repositories;

use app\db\MysqlDb;

class CourseRepository implements CourseInterface{
    private $db=null;

    public function __construct(){
        $this->db=new MysqlDb();
    }

    public function getAll(){
        $courses=[];
        $db=$this->db;
        $db->connect();
        $db->query("select * from courses");
        $db->execute();
        $result=$db->getResult();
        while($row=$result->fetch_assoc()){
            array_push($courses,$row);
        }

        $db->close();
        return $courses;
    }

}