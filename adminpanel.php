<?php
session_start();
if (strlen($_SESSION['id']==0)) {
  header('location:logout');
  } else{

if(count($_POST)>0) {
	require_once("dbconnection.php");
	$sql = "INSERT INTO paintings (p_name, image, p_price, description) VALUES ('" . $_POST["p_name"] . "','" . $_POST["image"] . "','" . $_POST["p_price"] . "','" . $_POST["description"] . "')";
	mysqli_query($con,$sql);
	$current_id = mysqli_insert_id($con);
	if(!empty($current_id)) {
		$message = "Added new painting successfully";
		echo "Added new painting successfully";


	}
}
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Agnieszka Lesiak Art</title>
		<meta charset="utf-8" />
		<link rel="icon" href="images/icon.png">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<span class="avatar"><img src="images/avatar.jpg" alt="" /></span>
						<h1><i> Agnieszka Lesiak</i></h1>

					</header>

				<h1> ADMIN PANEL </h1>
				<p><a  href="logout.php" class="btn btn-primary btn-large">Logout </a>




                <h2>ADD IMAGE</h2>
                <form action="uploads.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
                </form>





				<!-- Footer -->
					<footer id="footer">
						<p>&copy; Agnieszka Lesiak 2020. All rights reserved. </a> </a></p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
<?php } ?>