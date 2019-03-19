<?php

include_once('../../src/Attendance/Attendance.php');

use App\Attendance\Attendance;
session_start();
//$_POST['teacher_id'] = $_SESSION['id'];
$_POST['teacher_id'] = 2;
$admin= new Attendance();
$admin->prepare($_POST);
$student= $admin->store_start_class();

if( $student == true){

    $_SESSION['message']= "successfully stored";
    header('location:index.php');
}
else{
    $_SESSION['message']= "Stored Failed";
    header('location:index.php');
}




