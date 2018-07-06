<?php
class Admin{
    // property declaration
    private $id;
    private $name;
    private $priority;

    // method declaration
    function __construct($id, $name, $priority){
        $this->id = $id;
        $this->name = $name;
		$this->priority = $priority;
    }
    public function __destruct(){
        //destroy paper object
    }

    public function getPriority() {
        return $this->priority;
    }
}
?>