<?php

class Student{
    private $firstName="Jane";
    private $lastName="Doe";
    private $studentNumber="A00123456";
    private static $numberOfStudents=0;
    const Institution = "BCIT";

    public function __construct($firstName,$lastName,$studentNumber){
       
        $this->setFirstName($firstName);
        $this->setlastName($lastName);
        $this->setStudentNumber($studentNumber);
        self::$numberOfStudents++;

        if (self::$numberOfStudents >20){
          echo "<p>You have created more than 20 students! now the program dies!!!</p>";
          exit();
        }

       // echo "<p>Successfully create a Student Object</p>";

    }

    // public function __destruct(){
	// 	echo "<p>You can't create more students</p>";
	// 	self::$numberOfStudents--;	
	// }

    public function setFirstName($firstName){
        if(is_string($firstName) && strlen($firstName)>=2){
            $this->firstName = $firstName;
        }
        else {
            echo "<p>Ensure the first name should are at least 2 characters long</p>";
        
        }
    }

    public function setLastName($lastName){
        if(is_string($lastName) && strlen($lastName)>=2){
            $this->lastName = $lastName;
        }
        else {
            echo "<p>Ensure the last name should are at least 2 characters long</p>";
        }
    }

    public function setStudentNumber($studentNumber){
        if(is_string($studentNumber) && strlen($studentNumber)==9){
            $this->studentNumber = $studentNumber;
        }
        else {
            echo "<p>The student number should be exactly 9 characters long.</p>";
        }
    }


    public function getFirstName(){
        return $this->firstName;
    }

    public function getlastName(){
        return $this->lastName;
    }

    public function getstudentNum(){
        return $this->studentNumber;
    }

    public static function DisplaynumOfStudents(){
       // return self::$numberOfStudents;
        echo "<p>Number of Students: ".self::$numberOfStudents."</p>";	
    }

    public function work(){
        echo "<p>Code, code, code, test. Code, test. Submit</p>";
    }

    public function displayDetail(){
        echo "<p>Student Info:</p>";
        echo "<p>".$this->getFirstName(). ' '.$this->getLastName().','.$this->getstudentNum().','.self::Institution."</p>";
        echo "<p>Total Students:".self::$numberOfStudents."</p>";
    }

}


?>
