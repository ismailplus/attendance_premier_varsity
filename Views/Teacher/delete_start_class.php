<?php

include_once('../../src/Attendance/Attendance.php');

use App\Attendance\Attendance;
session_start();
//var_dump($_POST);die();
$admin= new Attendance();
$_POST['id'] = $_GET['id'];
$admin->prepare($_POST);
$student= $admin->deleteStartClass();

if( $student == true){

    $_SESSION['message']= "Deleted successfully";
    header('location:index.php');
}
else{
    $_SESSION['message']= "Deletion Failed";
    header('location:index.php');
}




