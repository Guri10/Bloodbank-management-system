<?php
$insert = false;
require_once "config.php";

// $reci_id = $_POST['reci_id'];
// $reci_name = $_POST['reci_name'];

$sql = "select * from recipient;";
$result = mysqli_query($con, $sql);
// $reci_id = mysqli_fetch_assoc($result);



// $sql1 = "update from recipient where reci_id = 2;";
// $result1 = mysqli_query($con,$sql1) ;    

if (isset($_POST['update'])) {
    $reci_id = stripslashes($_REQUEST['reci_id']);
    $reci_id = mysqli_real_escape_string($con, $_POST['reci_id']);
    $reci_name = stripslashes($_REQUEST['reci_name']);
    $reci_name = mysqli_real_escape_string($con, $_POST['reci_name']);
    $sql1 = "update recipient set reci_name = '$reci_name' where reci_id = '$reci_id';";

    if (mysqli_query($con, $sql1) == true) {
        echo " Success update";
    } else {
        echo "No " . mysqli_error($con);
    }
}


// if(isset($_GET['reci_id'])){
//     if($result1)
//     {
//         echo"successful update ";
//     }
//     else
//     {
//         echo"error in update ";
//     }

// }

$con->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update Blood Request</title>
    <!-- favicon -->
    <link href="/favicons/favicon.ico" rel="icon" type="image/x-icon" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/update_reci_list.css">
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
                    <th class="table_head2">Reci ID</th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                // echo "<br>";
                // echo "Blood grp : " . $row['b_grp'] . " <br>   Quantity : " . $row['B_qnty'];
                echo "<tr class='table_content'>";
                echo "<td>" . $row['reci_name'] . "</td>";
                echo "<td>" . $row['reci_id'] . "</td>";
            }
            ?>
        </table>
    </div>


    <form class="form" action="update_reci_list.php" method="POST">
        <h1>Enter update details</h1>
        <br>
        <input type="text" class="login-input" name="reci_id" placeholder="reci_id" required />
        <input type="text" class="login-input" name="reci_name" placeholder="reci_name" required />
        <br>
        <input type="submit" name="update" value="update" class="btn btn-dark btn-lg">
    </form>
</body>

</html>