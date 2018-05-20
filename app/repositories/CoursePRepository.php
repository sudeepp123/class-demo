<?php

namespace app\repositories;

use app\db\PgsqlDb;

class CoursePRepository implements CourseInterface{
    private $db=null;

    public function __construct(){
        $this->db=new PgsqlDb();
    }
    public function getAll(){
        $courses=[];
        $db=$this->db;
        $db->connect();
        $result = $db->query("select * from courses");
        
        while($row=$db->getResult($result)){
            array_push($courses,$row);
        }

        $db->close();
        return $courses;
    }
}