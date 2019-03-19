<?php
session_start();

//if (!isset($_SESSION['rf_id'])) {
//    header('location:scan_rf_id.php');
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student Attendance</title>
    <link type="text/css" rel="stylesheet" href="../../Resource/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../../Resource/MDB/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../../Resource/MDB/css/mdb.min.css">
    <link type="text/css" rel="stylesheet" href="../../Resource/MDB/css/style.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.min.css">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark indigo">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Student Attendance Management</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

</nav>

<div class="container">

    <div class="row " style="margin-top: 10px;">
        <section class="form-light col-6 offset-3">

            <!--Form without header-->
            <div class="card">
                <div class="footer pt-3 mdb-color lighten-3"></div>
                <div class="card-body mx-3">

                    <!--Header-->

                    <div class="text-center">
                        <h3 class="pink-text mb-5"><strong>Student Registration</strong></h3>
                    </div>

                    <!--Body-->
                    <form method="post" action="store_student.php">
                        <div class="row">
                            <div class="col-12">
                                <div class="md-form">
                                    <input
                                        name="name"
                                        placeholder="Student Name"
                                        type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="md-form">
                                    <input
                                        name="email"
                                        placeholder="Email"
                                        type="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="md-form">
                                    <input
                                        name="password"
                                        placeholder="password"
                                        type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="md-form">
                                    <input
                                        name="rf_id"
                                        type="text"
                                        placeholder="Card info"
                                        class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 offset-2">
                                <button type="submit" class=" btn btn-primary btn-block align-items-center ">Register</button>
                            </div>"
                        </div>
                        <div class="row">
                            <div class="col-6 offset-3 mt-1">
                                <span> Have an Account?</span><a href="student_login.php">Login Now</a>
                            </div>
                        </div>
                    </form>
                </div>

                <!--Footer-->
                <div class="footer pt-3 mdb-color lighten-3"></div>

            </div>
            <!--/Form without header-->

        </section>
    </div>

</div>

<script type="text/javascript" href="Resource/MDB/js/sweetalert.min.js"></script>
<script type="text/javascript" src="../../Resource/MDB/js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../../Resource/MDB/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../../Resource/MDB/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../../Resource/MDB/js/mdb.min.js"></script>
<script type="text/javascript">
    $('#message').show().delay(3000).fadeOut(1500);
</script>
</body>
</html>
