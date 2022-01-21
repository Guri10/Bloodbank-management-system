<?php
require('config.php');
// When form submitted, insert values into the database.
if (isset($_REQUEST['reci_name'])) {
    // removes backslashes
    $reci_name = stripslashes($_REQUEST['reci_name']);
    //escapes special characters in a string
    $reci_name = mysqli_real_escape_string($con, $reci_name);
    $reci_bgrp   = stripslashes($_REQUEST['reci_bgrp']);
    $reci_bgrp   = mysqli_real_escape_string($con, $reci_bgrp);
    $reci_bqnty  = stripslashes($_REQUEST['reci_bqnty']);
    $reci_bqnty  = mysqli_real_escape_string($con, $reci_bqnty);
    $reci_id  = stripslashes($_REQUEST['reci_id']);
    $reci_id  = mysqli_real_escape_string($con, $reci_id);
    //$reci_reg_date    = stripslashes($_REQUEST['reci_reg_date']);
    //$reci_reg_date    = mysqli_real_escape_string($con, $reci_reg_date);


    $query    = "INSERT into `blood_request` (reci_name ,  reci_bgrp, reci_bqnty, reci_id)
                     VALUES ('$reci_name' ,  '$reci_bgrp', '$reci_bqnty', '$reci_id');";
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
                  <h3>Blood Request registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='admindashboard.php'>Dashboard</a></p>
                  </div>";
    } else {
        echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='request_blood.php'>Request </a> again.</p>
                  </div>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Recipient Details</title>
    <!-- favicon -->
    <link href="favicons/favicon.ico" rel="icon" type="image/x-icon" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/request_blood.css">
    <!-- font awesome script -->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-a11y="true"></script>
</head>

<body>

    <div class="container-fluid">

        <nav class="navbar navbar-expand-lg navbar-dark">

            <a class="navbar-brand" href="">Blood bank management</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse nav_elements" id="navbarTogglerDemo02">

                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admindashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutus">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_blood_request.php">View blood requests</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>

    <form class="form" action="" method="post">
        <h1 class="login-title">Request Blood</h1>
        <input type="text" class="login-input" name="reci_name" placeholder="Recipient name" required />
        <input type="text" class="login-input" name="reci_bgrp" placeholder="Recipient bgrp" required />
        <input type="text" class="login-input" name="reci_bqnty" placeholder="Recipient bqnty" required />
        <input type="text" class="login-input" name="reci_id" placeholder="Recipient id" required />
        <input type="submit" name="submit" value="Register" class="btn btn-dark btn-lg register-button">

    </form>

</body>

</html>


