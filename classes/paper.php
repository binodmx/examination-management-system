 <?php 
    class Paper{
        // property declaration
        private $id;
        private $year;
        private $semester;
        private $department;
        private $link;

        // method declaration
        public function __construct($id, $year, $semester, $department){
            $this->id = $id;
            $this->year = $year;
            $this->semester = $semester;            
            $this->department = $department;
            $this->department = $link;
        }
        public function __destruct(){
            //destroy paper object
        }
        public function getID(){
            return $this->id;
        }
        public function getYear(){
            return $this->year;
        }
        public function getSemester(){
            return $this->semester;
        }
        public function getDepartment(){
            return $this->department;
        }
        public function getLink(){
            return $this->link;
        }
    }
?>