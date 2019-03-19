<?php

//var_dump($_POST);die();
include_once('../../src/Attendance/Attendance.php');

use App\Attendance\Attendance;
session_start();
//var_dump($_POST);die();
$admin= new Attendance();
$admin->prepare($_POST);
$subject= $admin->storeAssignSubject();

if( $subject == true){

    $_SESSION['message']= "Successfully stored";
    header('location:subject_assign.php');
}
else{
    $_SESSION['message']= "Stored Failed";
    header('location:subject_assign.php');
}




