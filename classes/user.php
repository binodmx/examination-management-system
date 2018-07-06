<?php
class User{
    // property declaration
    private $id;
    private $name;
    private $nic;
    private $mobile;
    private $email;
    private $faculty;
    private $department;

    // method declaration
    function __construct($id, $name){
		$this->id = $id;
		$this->name = $name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setNIC($nic){
        $this->nic = $nic;
    }
    public function setMobile($mobile){
        $this->mobile = $mobile;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setFaculty($faculty){
        $this->faculty = $faculty;
    }
    public function setDepartment($department){
        $this->department = $department;
    }
    public function getName() {
        return $this->name;
    }
        public function getNIC($nic){
        $this->nic = $nic;
    }
    public function getMobile($mobile){
        $this->mobile = $mobile;
    }
    public function getEmail($email){
        $this->email = $email;
    }
    public function getFaculty($faculty){
        $this->faculty = $faculty;
    }
    public function getDepartment($department){
        $this->department = $department;
    }
}
?>