<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>students_login</title>
    <link type="text/css" rel="stylesheet" href="../../Resource/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../../Resource/MDB/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../../Resource/MDB/css/mdb.min.css">
    <link type="text/css" rel="stylesheet" href="../../Resource/MDB/css/style.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.min.css">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark indigo">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Attendance Management System</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

</nav>

<div class="container">
    <div class="col-6 offset-3 alert alert-info text-center" id="message">
        <?php
        if(!empty($_SESSION['message'])) {
            echo  $_SESSION['message'];
        }
        ?>
    </div>
    <div class="row " style="margin-top: 10px;">
        <section class="form-light col-6 offset-3">

            <!--Form without header-->
            <div class="card">
                <div class="footer pt-3 mdb-color lighten-3"></div>
                <div class="card-body mx-3">

                    <!--Header-->

                    <div class="text-center">
                        <h3 class="pink-text mb-5"><strong>Student Login</strong></h3>
                    </div>

                    <!--Body-->
                    <form method="post" action="scan_card_for_login_check.php">
<!--                        <div class="md-form">-->
<!--                            <input-->
<!--                                name="username"-->
<!--                                placeholder="Username"-->
<!--                                type="text" id="Form-email2" class="form-control">-->
<!---->
<!--                        </div>-->
<!---->
<!--                        <div class="md-form">-->
<!--                            <input-->
<!--                                name="fingerprint"-->
<!--                                type="text"-->
<!--                                placeholder="Fingerprint"-->
<!--                                id="Form-pass" class="form-control">-->
<!---->
<!--                        </div>-->
                        <div class="row">
                            <div class="col-6 offset-2">
                                <button type="submit" class=" btn btn-info btn-block align-items-center ">Scan Card</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6 offset-3 mt-1">
                                <span> Not Register Yet?</span><a href="student_registration.php">Register Here</a>
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

<script type="text/javascript" href="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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