<?php 
    class paper{
        private $year;
        private $semester;
        private $moduleId;
        private $department;
        private $link;

        public function __construct( $md, $yr, $sm, $dp, $li){
            $this->year = $yr;
            $this->semester = $sm;
            $this->moduleId = $md;
            $this->department = $dp;
            $this->link = $li;
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
        public function getLink(){
            return $this->link;
        }  
    }
?>