<?php
require('config.php');
// When form submitted, insert values into the database.
if (isset($_REQUEST['b_grp'])) { // removes backslashes
    $b_grp    = stripslashes($_REQUEST['b_grp']);
    //escapes special characters in a string
    $b_grp    = mysqli_real_escape_string($con, $b_grp);
    $b_qnty    = stripslashes($_REQUEST['b_qnty']);
    $b_qnty    = mysqli_real_escape_string($con, $b_qnty);

    $query    = "UPDATE `blood_stock` set b_qnty = b_qnty + $b_qnty WHERE b_grp = '$b_grp'";
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
                  <h3>Blood Stock Added successfully.</h3><br/>
                  <p class='link'>Click here to <a href='admindashboard.php'>Dashboard</a></p>
                  </div>";
    } else {
        echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to add again <a href='add_blood_stock.php'>Blood Stock</a> </p>
                  </div>";
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Blood Bank management</title>
    <!-- favicon -->
    <link href="/favicons/favicon.ico" rel="icon" type="image/x-icon" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/blood_stock.css">
    <!-- font awesome script -->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-a11y="true"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
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

                </ul>
            </div>
        </nav>
    </div>


    <div class="stock_details">
        <form class="form" action="" method="post">
            <h1 class="stock-title">Add Blood Stock details</h1>
            <input type="text" class="stock-input" name="b_grp" placeholder="Blood Group" required />
            <input type="number" class="stock-input" name="b_qnty" placeholder="Blood Quantity" required />
            <input type="submit" name="submit" value="Add" class="btn btn-dark btn-lg stock-button">

        </form>

        <img class="blood4" src="/images/blood4.jpg" alt="blood image">
    </div>


 


</body>

</html>