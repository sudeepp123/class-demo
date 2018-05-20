<?php

namespace app\db;

class PgsqlDb{
    private $conn=null;
    public function connect(){
        $host        = "host = ec2-54-225-200-15.compute-1.amazonaws.com";
        $port        = "port = 5432";
        $dbname      = "dbname = d4hp0k6fjs4fo6";
        $credentials = "user = mbznicikditsid password=a2522df0b17934987f4830f1664e1524cda020fab91a17b4f005e20215b1170c";
    
        $this->conn = pg_connect( "$host $port $dbname $credentials"  );
        
    }

    public function query($sql){
        return pg_query($this->conn,$sql);
    }

    public function execute($sql,$args){
        pg_prepare($this->conn,'crud-query',$sql);
        return pg_execute($this->conn,'crud-query',$args);
    }

    public function getResult($result){
        return pg_fetch_assoc($result);
    }

    public function close(){
        pg_close($this->conn);
    }
}
