<?php
require_once "user.php";
require_once "paper.php";
class Student extends User{
    // property declaration
    private $semester;
    private $results;
    private $modules;   // 2d array

    // method declaration
    function __construct($id, $name){
        parent::__construct($id, $name);
    }
    public function __destruct(){
        //destroy paper object
    }

    public function addResult(){
        $this->results = new Result();
    }

    // update getter and setter methods
}
?>