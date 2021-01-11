<?php
$target_dir = "images/paintings/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists." ;
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  print_r($_FILES["fileToUpload"]["name"]);
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

if(count($_POST)>0) {
    require_once("dbconnection.php");
    $sql = "INSERT INTO paintingsrow3 (p_name, image, p_price, description, f_image) VALUES ('" . $_POST["p_name"] . "','" . $_POST["image"] . "','" . $_POST["p_price"] . "','" . $_POST["description"] . "','" . $_POST["f_image"] . "')";
    mysqli_query($con,$sql);
    $current_id = mysqli_insert_id($con);
    if(!empty($current_id)) {
        $message = "Added new painting successfully";

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
						<h1><i>Agnieszka Lesiak</i></h1>
						<ul class="icons">
                            <a href="index.php" class="icon style2 fa-home"><span class="label"></span></a>
						</ul>
					</header>
                                <h1>Upload Image to row 3</h1>

                                <form name="frmUser" method="post" action="">
                                    <div style="width:500px;">
                                        <div><?php if(isset($message)) { echo $message; } ?></div>
                                        <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
                                            <tr class="tableheader">
                                                <td colspan="2">Add New Painting</td>
                                            </tr>
                                            <tr>
                                                <td><label>Name</label></td>
                                                <td><input type="text" name="p_name" class="txtField"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Image</label></td>
                                                <td><input type="text" name="image" class="txtField" value="images/paintings/<?php print_r($_FILES["fileToUpload"]["name"])?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><label>Image</label></td>
                                                <td><input type="text" name="f_image" class="txtField" value="images/fulls/<?php print_r($_FILES["fileToUpload"]["name"])?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><label>Price</label></td>
                                                <td><input type="text" name="p_price" class="txtField" value="0"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Description</label></td>
                                                <td><input type="text" name="description" class="txtField"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><input type="submit" name="submitImage" value="Upload Image" class="btnSubmit"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
<?php
}
?>


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
