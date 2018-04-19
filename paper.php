<?php 
    class paper{
        var $year;
        var $semester;
        var $moduleId;
        var $department;
        var $content;

        function __construct($yr, $sm, $md, $dp, $ct){
            $this->year = $yr;
            $this->semester = $sm;
            $this->moduleId = $md;
            $this->department = $dp;
            $this->content = $ct;
        }
        function __destruct(){
            //destroy paper object
        }
        function getYear(){
            return $this->year;
        }
        function getSemester(){
            return $this->semester;
        }
        function getModuleId(){
            return $this->moduleId;
        }
        function getDepartment(){
            return $this->department;
        }
        function getContent(){
            return $this->content;
        }  

    }
?>