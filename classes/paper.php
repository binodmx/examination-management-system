 <?php 
    class Paper{
        // property declaration
        private $id;
        private $year;
        private $semester;
        private $department;
        private $availability;

        // method declaration
        public function __construct($id, $year, $semester, $department){
            $this->id = $id;
            $this->year = $year;
            $this->semester = $semester;            
            $this->department = $department;
        }
        public function __destruct(){
            //destroy paper object
        }
        public function getYear(){
            return $this->year;
        }
        public function getSemester(){
            return $this->semester;
        }
        public function getModuleId(){
            return $this->moduleId;
        }
        public function getDepartment(){
            return $this->department;
        }
        public function isAvailable(){
            return $this->availability;
        }  

        // set setter methods
    }
?>