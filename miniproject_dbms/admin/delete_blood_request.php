<?php

require_once "config.php";
$insert = false;

// $sql = "select view_stock('". $_POST["b_grp"] ."')";
$sql = "select * from blood_request;";
$result = mysqli_query($con, $sql);
$reci_id = mysqli_fetch_assoc($result);
$insert = true;
// while ($row = mysqli_fetch_array($result)) {
//     echo "<br>";
//     echo "Recipient name : " . $row['reci_name'] . " Blood Group : " . $row['reci_bgrp'] . " Blood Quantity : " . $row['reci_bqnty'] . " Reci_ID : " . $row['reci_id'];
// }


// $sql1 = "Delete from blood_request where reci_id = 2;";
// $result1 = mysqli_query($con,$sql1) ;    

if (isset($_POST['delete'])) {
    $reci_id = mysqli_real_escape_string($con, $_POST['reci_id']);
    $sql1 = "Delete from blood_request where reci_id = '$reci_id';";

    if (mysqli_query($con, $sql1)) {
        echo " Success delete";
    } else {
        echo "No success delete";
    }
}


if (isset($_GET['reci_id'])) {
    if ($result1) {
        echo "successful delete ";
    } else {
        echo "error in delete ";
    }
}

$con->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Blood Request</title>
    <!-- favicon -->
    <link href="favicons/favicon.ico" rel="icon" type="image/x-icon" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/delete_blood_request.css">
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
                        <a class="nav-link" href="#aboutus">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>

    <div class="middle">
        <table>
            <thead>
                <tr>
                    <th class="table_head1">Recipient name</th>
                    <th class="table_head2">Blood Group</th>
                    <th class="table_head2">Blood Quantity</th>
                    <th class="table_head2">Recipient ID</th>
                </tr>
            </thead>
            <?php
            if ($insert == true) {
                while ($row = mysqli_fetch_array($result)) {
                  
                    echo "<tr class='table_content'>";
                    echo "<td>" . $row['reci_name']. "</td>";
                    echo "<td>" . $row['reci_bgrp'] . "</td>";
                    echo "<td>" . $row['reci_bqnty']  . "</td>";
                    echo "<td>" .$row['reci_id'] . "</td>";
                }
                
            }
            ?>
        </table>
    </div>

    <div class="form">
        <form action="delete_blood_request.php" method="POST">
            <input type="text" class="delete_request" name="reci_id" placeholder="reci_id" required />

            <input type="submit" name="delete" value="delete" class="btn btn-dark btn-lg delete_button">
        </form>

    </div>
    
</body>

</html>