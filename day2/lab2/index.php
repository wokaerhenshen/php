<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
function __autoload($classFileName){
	require_once( $classFileName . ".php");
}

$carolyn1 = new Student("C","Ho","A01007777");
$carolyn2= new Student("Ca","H","A01007777");
$carolyn3 = new Student("Ca","Ho","A0100");
$carolyn3->displayDetail();

$carolyn = new Student("Carolyn","Ho","A01007777");
$karl = new Student("Karl","Xu","A01007088");
$karl->displayDetail();
$karl->work();





$Daniel = new SSD_Student("Daniel","Post","A01111111");
$Daniel->displayDetail();
$Daniel->work();
$Daniel->play();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();
$karl = new Student("Karl","Xu","A01007088");
Student::DisplaynumOfStudents();

?>
</body>
</html>