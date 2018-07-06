<?php
class Result{
    // property declaration
    private $semester;
    private $marks  = array();
    private $sgpa;

    // method declaration
    function __construct($semester){
		$this->semester = $semester;
    }
    public function __destruct(){
        //destroy paper object
    }
    public function addMarks($id, $mark){
        $this->marks[$id] = $mark;
    }
    public function getMarks($id) {
        return $this->marks[$id];
    }
    public function getSGPA(){
        return $this->sgpa;
    }
}
?>