<?php session_start();
require_once('dbconnection.php');

//Code for Registration
if(isset($_POST['signup']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$enc_password=$password;
$sql=mysqli_query($con,"select id from users where email='$email'");
$row=mysqli_num_rows($sql);
if($row>0)
{
	echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
} else{
	$msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno) values('$fname','$lname','$email','$enc_password','$contact')");

if($msg)
{
	echo "<script>alert('Register successfully');</script>";
}
}
}

// Code for login
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$useremail=$_POST['uemail'];
$ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="adminpanel";
$_SESSION['login']=$_POST['uemail'];
$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['fname'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra"); //LOGIN REDIRECTION
exit();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="admin";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
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
						<h1><i> Agnieszka Lesiak Admin Panel</i></h1>

					</header>

                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading  animate-box">
                    <br><br>

                        <h2>Login</h2>
                        <p>Log in to access your account.</p>

                        <form name="login" action="" method="post">
                            <input type="text" class="text" name="uemail" value="" placeholder="Email"  ><a href="#" class=" icon email"></a>
                            <input type="password" value="" name="password" placeholder="Password"><a href="#" class=" icon lock"></a>
                            <div class="p-container">
                                <br><br>
                                <input type="submit" name="login" class="btn btn-primary" value="LOG IN" >
                                <br><br>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>