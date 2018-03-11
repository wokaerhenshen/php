<?php 
require_once("Student.php");

class SSD_Student extends Student{

    public function work(){
        echo "<p>Code, code, test, submit</p>";
    }

    public function play(){
        echo "<p>I will play dota2 today!</p>";
    }
}
?>