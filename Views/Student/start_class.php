<?php
include_once('../../src/Attendance/Attendance.php');
use App\Attendance\Attendance;
session_start();

$subjects= new  Attendance();
//$_POST['student_id'] = $_SESSION['student_id'];
$_POST['student_id'] = 2;
$subjects->prepare($_POST);
$started_classes = $subjects->getStartedClass();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>front</title>
    <link type="text/css" rel="stylesheet" href="../../Resource/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../../Resource/MDB/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../../Resource/MDB/css/mdb.min.css">
    <link type="text/css" rel="stylesheet" href="../../Resource/MDB/css/style.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.min.css">
    <style>
        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: red;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 10px;
        }

        #myBtn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark indigo">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Attendance Management</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="start_class.php">Start Class </a>
            </li>
        </ul>
    </div>
</nav>


<div class="container">
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <div class="row">
        <div class="">
            <a class=""><i class="glyphicon glyphicon-search"></i></a>
        </div>

        <div class="wall col-12" style="margin-bottom: -50px;">

            <div class="row card" style="margin:5px; margin-top: 10px; ">
                <div class="footer pt-3 mdb-color lighten-2">
                    <div class="text-center">
                        <h5 class="unique-text"><strong>Started Class Details</strong></h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Started Class Details</h4>
                            <table class="table table-bordered table-striped">
                                <thead class="text-center">
                                <tr>
                                    <th>Teacher Name</th>
                                    <th>Subject Name</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Attend</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($started_classes))foreach ($started_classes as $subject){ ?>
                                    <tr>
                                        <td><?php echo $subject['teacher_id']?></td>
                                        <td><?php echo $subject['sub_code']?></td>
                                        <td><?php echo $subject['start_time']?></td>
                                        <td><?php echo $subject['end_time']?></td>
                                        <td>
                                            <?php
                                                $start_time =  $subject['start_time'];
                                                $end_time =  $subject['end_time'];

                                                $now_time = new DateTime(null, new DateTimezone('Asia/Dhaka'));
                                                $now_time->format('Y-m-d H:i:s');

                                                if ($end_time > $now_time){
                                            ?>
                                            <a class="btn btn-primary">scan card gor attent the class</a>
                                            <?php } else { ?>
                                                Attending Time Expired
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script type="text/javascript" href="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="../../Resource/MDB/js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../../Resource/MDB/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../../Resource/MDB/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../../Resource/MDB/js/mdb.min.js"></script>
<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

</body>
</html>

<!--Navbar-->

