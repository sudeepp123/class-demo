<?php

spl_autoload_register(function($className){
    include_once($className.".php");
});

use app\repositories\CourseRepository;
use app\repositories\CoursePRepository;
use app\repositories\CourseInterface;

class CourseRepositoryFactory{
    public static function get($type){
        if($type=='mysql'){
            return new CourseRepository();
        }
        else if($type=='pgsql'){
            return new CoursePRepository();
        }
    }
}

class CourseContext{
    private $ctx;

    public function __construct(CourseInterface $ctx){
        $this->ctx=$ctx;
    }

    public function all(){
        return $this->ctx->getAll();
    }
}

$repo=new CourseContext(new CoursePRepository());
print_r($repo->all());

