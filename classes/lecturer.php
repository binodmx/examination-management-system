<?php
require_once "user.php";
class Lecturer extends User{
    // property declaration
    private $modules = array();

    // method declaration
    function __construct($id, $name){
        parent::__construct($id, $name);
    }
    public function __destruct(){
        //destroy paper object
    }
    public function addModule($module){
        if (!in_array($module, $this->modules)){
            array_push($this->modules, $module);
        }
    }
    public function getModules() {
        return $this->modules;
    }
}
?>