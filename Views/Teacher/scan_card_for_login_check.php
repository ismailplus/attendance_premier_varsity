<?php

include_once('../../src/Attendance/Attendance.php');

use App\Attendance\Attendance;
session_start();
//var_dump($_POST);die();
$student= new Attendance();
$student->prepare($_POST);
$check= $admin->checkTeacherLogin();

if( $check >= 1){
    $_SESSION['rf_id']= $_POST['rf_id'];
    $_SESSION['id']= $check;
    $_SESSION['message']= "successfully logged";
    header('location:index.php');
}
else{
    $_SESSION['message']= "Wrong input";
    header('location:teacher_login.php');
}
