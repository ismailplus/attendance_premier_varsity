<?php
namespace App\Attendance;

class Attendance{

    public $conn;
    public $id;
    public $password;
    public $name;
    public $email;
    public $rf_id;
    public $sub_code;
    public $teacher_id;
    public $start_time;
    public $end_time;
    public $student_id;

    public function prepare($data){
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('password',$data)){
            $this->password=$data['password'];
        }
        if(array_key_exists('name',$data)){
            $this->name=$data['name'];
        }
        if(array_key_exists('email',$data)) {
            $this->email = $data['email'];
        }
        if(array_key_exists('age',$data)) {
            $this->age = $data['age'];
        }
        if(array_key_exists('rf_id',$data)) {
            $this->rf_id = $data['rf_id'];
        }
        if(array_key_exists('sub_code',$data)) {
            $this->sub_code = $data['sub_code'];
        }
        if(array_key_exists('teacher_id',$data)) {
            $this->teacher_id = $data['teacher_id'];
        }
        if(array_key_exists('start_time',$data)) {
            $this->start_time = $data['start_time'];
        }
        if(array_key_exists('end_time',$data)) {
            $this->end_time = $data['end_time'];
        }
        if(array_key_exists('student_id',$data)) {
            $this->student_id = $data['student_id'];
        }
        return $this;
    }


    public function __construct()
    {
        $this->conn=mysqli_connect("localhost","root","","attendance_system");
    }

    public function checkStudentLogin()
    {
        $query = "SELECT * FROM `students` WHERE `rf_id` = '".$this->rf_id."'";
        if($result=mysqli_query($this->conn,$query)){
            $row=mysqli_fetch_assoc($result);
            //var_dump($row);die();
            return $row['id'];
        }
    }
    public function checkTeacherLogin()
    {
        $query = "SELECT * FROM `teachers` WHERE `rf_id` = '".$this->rf_id."'";
        if($result=mysqli_query($this->conn,$query)){
            $row=mysqli_fetch_assoc($result);
            //var_dump($row);die();
            return $row['id'];
        }
    }
    public function student_registration(){
        $query="INSERT INTO `students` (`name`, `email`, `rf_id`, `password`) 
                VALUES ('".$this->name."', '".$this->email."', '".$this->rf_id."', '".$this->password."')";
        if(mysqli_query($this->conn,$query)){return true;}
        else return false;
    }
    public function teacher_registration(){
        $query="INSERT INTO `teachers` ( `name`, `email`, `rf_id`, `password`) 
                VALUES ('".$this->name."', '".$this->email."', '".$this->rf_id."', '".$this->password."')";
        if(mysqli_query($this->conn,$query)){return true;}
        else return false;
    }

    public function storeSubject(){
        //var_dump($_POST);die();
        $query="INSERT INTO `subjects` ( `name`, `sub_code`)
                VALUES ('".$this->name."', '".$this->sub_code."')";
        //var_dump($query);die();
        if(mysqli_query($this->conn,$query)){return true;}
        else return false;
    }
    public function storeAssignSubject(){
        //var_dump($_POST);die();
        $query="INSERT INTO `assign_subjects_to_teachers` ( `sub_code`, `teacher_id`) 
                VALUES ('".$this->sub_code."', '".$this->teacher_id."')";
        //var_dump($query);die();
        if(mysqli_query($this->conn,$query)){return true;}
        else return false;
    }
    public function store_start_class(){
        //var_dump($_POST);die();
        $already_start_or_not ="SELECT * FROM `start_classes` WHERE sub_code='".$this->sub_code."' AND teacher_id=$this->id";
        $results = (mysqli_query($this->conn,$already_start_or_not));

        if($results->num_rows == 1){
            return false;
        }
        else{
            $query="INSERT INTO `start_classes` ( `sub_code`, `teacher_id`, `start_time`, `end_time`)  
                VALUES ('".$this->sub_code."', '".$this->teacher_id."','".$this->start_time."', '".$this->end_time."')";
            //var_dump($query);die();
            if(mysqli_query($this->conn,$query)){return true;}
            else return false;
        }
    }
    public function store_register_subject(){
        //var_dump($_POST);die();
        $already_register_or_not ="SELECT * FROM `reg_sub_by_students` WHERE sub_code='".$this->sub_code."' AND student_id=$this->student_id";
        //var_dump($already_register_or_not);die();
        $results = (mysqli_query($this->conn,$already_register_or_not));
        //var_dump($results->num_rows);die();
        if($results->num_rows == 1){
            return false;
        }
        else{
            $query="INSERT INTO `reg_sub_by_students` (`student_id`, `sub_code`)  
                VALUES ('".$this->student_id."', '".$this->sub_code."')";
            //var_dump($query);die();
            if(mysqli_query($this->conn,$query)){return true;}
            else return false;
        }
    }

    public function getAllSubjects(){
        $candidates=array();
        $query="SELECT * FROM `subjects`";
        if($result=mysqli_query($this->conn,$query)){
            while ($row=mysqli_fetch_assoc($result)){
                $candidates[]=$row;
            }
            return $candidates;
        }
    }
    public function getAllTeachers(){
        $candidates=array();
        $query="SELECT * FROM `teachers`";
        if($result=mysqli_query($this->conn,$query)){
            while ($row=mysqli_fetch_assoc($result)){
                $candidates[]=$row;
            }
            return $candidates;
        }
    }
    public function getAllSubjectAssign(){
        $candidates=array();
        $query="SELECT * FROM `assign_subjects_to_teachers`";
        if($result=mysqli_query($this->conn,$query)){
            while ($row=mysqli_fetch_assoc($result)){
                $candidates[]=$row;
            }
            return $candidates;
        }
    }
    public function getAllStartClassForTeacher(){
        $candidates=array();
        $query="SELECT * FROM `start_classes` WHERE teacher_id =$this->id";
        if($result=mysqli_query($this->conn,$query)){
            while ($row=mysqli_fetch_assoc($result)){
                $candidates[]=$row;
            }
            return $candidates;
        }
    }
    public function getSubjectAssignToTeacher(){

        $subjects=array();
        $query="SELECT subjects.sub_code, subjects.name FROM subjects INNER JOIN assign_subjects_to_teachers ON subjects.sub_code = assign_subjects_to_teachers.sub_code WHERE teacher_id =$this->id";
        if($result=mysqli_query($this->conn,$query)){
            while ($row=mysqli_fetch_assoc($result)){
                $subjects[]=$row;
            }
            return $subjects;
        }
    }
    public function getSubjectRegisterByStudent(){
        $subjects=array();
        $query="SELECT * FROM `reg_sub_by_students` WHERE student_id=$this->student_id";
        if($result=mysqli_query($this->conn,$query)){
            while ($row=mysqli_fetch_assoc($result)){
                $subjects[]=$row;
            }
            return $subjects;
        }
    }

    public function deleteStartClass(){
        $query=" DELETE FROM `start_classes` WHERE `start_classes`.`id` = $this->id";
        if(mysqli_query($this->conn,$query)){return true;}
        else return false;
    }

    public function getStartedClass(){
        $subjects=array();
        $query="SELECT * FROM `start_classes` INNER JOIN reg_sub_by_students on reg_sub_by_students.sub_code = start_classes.sub_code WHERE reg_sub_by_students.student_id =$this->student_id";
        if($result=mysqli_query($this->conn,$query)){
            while ($row=mysqli_fetch_assoc($result)){
                $subjects[]=$row;
            }
            return $subjects;
        }
    }

}