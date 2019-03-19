<?php

include_once('../../src/Attendance/Attendance.php');

use App\Attendance\Attendance;
session_start();

$subjects= new  Attendance();

$allsubjects = $subjects->getAllSubjects();
//
//$semester= new Routine();
//$happening=$semester->getTodayClassByPeriod();
//$news=$semester->getAllNotice();
//$getDays_id=$semester->getAllDays();

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
            <li class="nav-item ">
                <a class="nav-link" href="subject_assign.php">Subject Assign</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="subject_taken.php">Subject Taken</a>
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
                        <h5 class="unique-text"><strong>Subject Details</strong></h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead class="text-center">
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($allsubjects))foreach ($allsubjects as $subject){ ?>
                                    <tr>
                                        <td><?php echo $subject['sub_code']?></td>
                                        <td><?php echo $subject['name']?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="store_subject.php">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="md-form">
                                            <input
                                                name="name"
                                                placeholder="Subject Name"
                                                type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="md-form">
                                            <input
                                                name="sub_code"
                                                placeholder="Subject Code"
                                                type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 offset-2">
                                        <button type="submit" class=" btn btn-primary btn-block align-items-center ">Submit</button>
                                    </div>"
                                </div>
                            </form>
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

