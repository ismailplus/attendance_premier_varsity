<?php
session_start();
$file_address='http://192.168.31.251';
$file = file_get_contents("$file_address/enroll");

$fp = fopen("ernroll.csv", "r");

$data= array();
while(! feof($fp))
{
    $data[] = fgetcsv($fp);
    //print_r($data);
    $_SESSION['rf_id']= $data;
}

fclose($fp);
header('location:teacher_registration.php');

