<?php

namespace app\db;

class PgsqlDb{
    private $conn=null;
    public function connect(){
        $host        = "host = ec2-54-225-96-191.compute-1.amazonaws.com";
        $port        = "port = 5432";
        $dbname      = "dbname = d98701brgv1p5f";
        $credentials = "user = knuxhlpzvrkxvv password=56ccccfb417605ca9252f73efcee49b122fbc66fe500f7412c1c9e54d2495212";
    
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
