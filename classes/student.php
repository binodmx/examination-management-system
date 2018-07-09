<?php
require_once "user.php";
require_once "paper.php";
class Student extends User{
    // property declaration
    private $batch;
    private $semester;
    private $results = array();
    private $modules = array();
    private $registration = array("1"=>FALSE, "2"=>FALSE, "3"=>FALSE, "4"=>FALSE, "5"=>FALSE, "6"=>FALSE, "7"=>FALSE, "8"=>FALSE);

    // method declaration
    function __construct($id, $name){
        parent::__construct($id, $name);
    }
    public function __destruct(){
        //destroy paper object
    }
    public function getBatch(){
        return $this->batch;
    }
    public function getSemester(){
        return $this->semester;
    }
    public function getResult($module){
        return $this->results[$module];
    }
    public function getResults(){
        return $this->results;
    }
    public function getModules($semester){
        return $this->modules[$semester];
    }
    public function isRegistered($semester){
        return $this->registration[$semester];
    }
    public function setBatch($batch){
        $this->batch = $batch ;
    }
    public function setSemester($semester){
        $this->semester = $semester;
    }
    public function addResults($id, $marks){
        $this->results[$id] = $marks;
    }
    public function register($semester, $modules){
        $this->registration[$semester] = TRUE;
        $this->modules[$semester] = $modules;
    }    
}
?>