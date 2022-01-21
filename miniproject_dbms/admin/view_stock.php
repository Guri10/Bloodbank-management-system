<?php
$insert = false;
require('config.php');

if (isset($_POST["submit"])) {
	// $sql = "select view_stock('". $_POST["b_grp"] ."')";
	$b_grp = $_POST['b_grp'];
	$sql = "select * from blood_stock where b_grp = '$b_grp' ;";
	$result = mysqli_query($con, $sql);
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
	<!-- favicon -->
	<link href="/favicons/favicon.ico" rel="icon" type="image/x-icon" />
	<!-- bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/view_stock.css">
	<!-- font awesome script -->
	<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-a11y="true"></script>
	<title>blood bank management</title>
</head>

<body>

	<!-- navigaton section -->
	<div class="container-fluid">

		<nav class="navbar navbar-expand-lg navbar-dark">

			<a class="navbar-brand" href="">Blood bank management</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse nav_elements" id="navbarTogglerDemo02">

				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="admindashboard.php">Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="add_blood_stock.php">Add stock</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="view_blood_request.php">view blood request</a>
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




	<form class="form" action="" method="POST">
		<h1 class="stock-title">View Blood Stock</h1>
		<input type="text" class="stock-input" name="b_grp" placeholder="Blood Group" required />

		<input type="submit" name="submit" value="View" class="btn btn-dark btn-lg stock-button">

	</form>
	<div class="middle">
		<table>
			<thead>
				<tr>
					<th class="table_head1">Blood grp</th>
					<th class="table_head2">Quantity</th>
				</tr>
			</thead>
			<?php
			if ($insert == true) {
				while ($row = mysqli_fetch_array($result)) {
					echo "<br>";
					// echo "Blood grp : " . $row['b_grp'] . " <br>   Quantity : " . $row['B_qnty'];
					echo "<tr class='table_content'>";
					echo "<td>" . $row['b_grp'] . "</td>";
					echo "<td>" . $row['B_qnty'] . "</td>";
				}
			}
			?>
		</table>
	</div>



</body>

</html>