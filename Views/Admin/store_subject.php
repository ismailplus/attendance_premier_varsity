<?php

//var_dump($_POST);die();
include_once('../../src/Attendance/Attendance.php');

use App\Attendance\Attendance;
session_start();
//var_dump($_POST);die();
$admin= new Attendance();
$admin->prepare($_POST);
$subject= $admin->storeSubject();

if( $subject == true){

    $_SESSION['message']= "successfully stored";
    header('location:index.php');
}
else{
    $_SESSION['message']= "Stored Failed";
    header('location:index.php');
}




