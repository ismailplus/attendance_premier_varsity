<?php

include_once('../../src/Attendance/Attendance.php');

use App\Attendance\Attendance;
session_start();
//var_dump($_POST);die();
$admin= new Attendance();
$admin->prepare($_POST);
$student= $admin->teacher_registration();

if( $student == true){

    $_SESSION['message']= "successfully stored";
    header('location:teacher_login.php');
}
else{
    $_SESSION['message']= "Stored Failed";
    header('location:teacher_registration.php');
}




