<?php 
require_once('student.php');
include('lang.php');  
include('ManageLang.php');


$interest = $_GET['interest'];
$course   = $_GET['course'];
$length   = $_GET['length'];
$hours    = $_GET['hours'];
$share    = $_GET['share'];
$firstname= strip_tags($_GET['firstname']);
$name     = strip_tags($_GET['name']);
$phone    = strip_tags($_GET['phone']);
$email    = strip_tags($_GET['email']);

$student = new Student();
$student->insert($interest,$course,$length,$hours,$share,$firstname,$name,$phone,$email);

 header("Location:thanks.php?name=".$name);


?>