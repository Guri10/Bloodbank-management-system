<?php

require('config.php');
$insert = false;
if (isset($_POST["submit"])) {
	// $sql = "select view_stock('". $_POST["b_grp"] ."')";
	$d_id = $_POST['d_id'];
	$sql = "call view_donor_eligibility('$d_id');";
	$sql1 = "select eligibility from donor where d_id = '$d_id';";
	$result = mysqli_query($con, $sql);
	$result1 = mysqli_query($con, $sql1);
	$insert = true;
}


$con->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Donor Eligibility</title>
	<!-- favicon -->
	<link href="favicons/favicon.ico" rel="icon" type="image/x-icon" />
	<!-- bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/view_donor_eligibility.css">
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
	<?php
	if ($insert == true) {
		while ($row = mysqli_fetch_array($result1)) {
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<h2>" . "Eligibility : " . $row['eligibility'] . "</h2>";

			// echo "Eligibility : " . $row['eligibility'];
		}
	}

	?>

	<form class="form" action="" method="POST">
		<h1 class="login-title">View Donor Eligibility</h1>
		<br>
		<input type="text" class="login-input" name="d_id" placeholder="Donor ID" required />
		<input type="submit" name="submit" value="View" class="btn btn-dark btn-lg register-button">

	</form>

</body>

</html>