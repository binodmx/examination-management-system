 <?php 
    class Module{
        // property declaration
        private $id;
        private $name;
        private $semester;
        private $credits;
        private $department;
        private $compulsory = FALSE;

        // method declaration
        public function __construct($id){
            $this->id = $id;
        }
        public function __destruct(){
            //destroy paper object
        }
        public function getID(){
            return $this->id;
        }
        public function getName(){
            return $this->name;
        }
        public function getSemester(){
            return $this->semester;
        }
        public function getCredits(){
            return $this->credits;
        }
        public function getDepartment(){
            return $this->department;
        }
        public function isCompulsory(){
            return $this->compulsory;
        }
        public function setID($id){
            $this->id = $id;
        }
        public function setName($name){
            $this->name = $name;
        }
        public function setSemester($semester){
            $this->semester = $semester;
        }
        public function setCredits($credits){
            $this->credits = $credits;
        }
        public function setDepartment($department){
            $this->department = $department;
        }
        public function setCompulsory($compulsory){
            $this->compulsory = $compulsory;
        }
    }
?>