<?php session_start();
require_once('dbconnection.php');
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
        <ul class="icons">
            <li><a href="https://www.facebook.com/profile.php?id=100011266951371" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="https://www.instagram.com/agapainting.art/" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="mailto:agnieszka.lesaik@hotmail.com" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
            <li><a href="admin.php" class="icon style2 fa-lock"><span class="label">Admin</span></a></li>
        </ul>
    </header>

    <!-- Main -->
    <section id="main">

        <!-- Thumbnails -->
        <section class="thumbnails">
            <div>
                <?php
                $query = "SELECT * FROM paintings ORDER BY id ASC";
                $result = mysqli_query($con, $query);

                if(mysqli_num_rows($result) > 0)
                {
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
                    <a href="<?php echo $row["f_image"]; ?>">
                        <img src="<?php echo $row["image"]; ?>" alt="" />
                        <h3><?php echo $row["description"]; ?>cm</h3>
                        <h3><?php
                            if ($row["p_price"] == 0){
                                ?><h3 style="color:red;"> SOLD </h3> <?php
                            }else{echo "Price: &euro;" . $row["p_price"];} ?>
                        </h3>
                    </a>
                    <?php }} ?>
            </div>


            <div>
                <?php
                $query2 = "SELECT * FROM paintingsrow2 ORDER BY id ASC";
                $result2 = mysqli_query($con, $query2);

                if(mysqli_num_rows($result2) > 0)
                {
                while($row2 = mysqli_fetch_array($result2))
                {
                ?>
                <form method="post" action="index.php?action=add&id=<?php echo $row2["id"]; ?>">
                    <a href="<?php echo $row2["f_image"]; ?>">
                        <img src="<?php echo $row2["image"]; ?>" alt="" />
                        <h3><?php echo $row2["description"]; ?>cm</h3>
                        <h3><?php
                            if ($row2["p_price"] == 0){
                                ?><h3 style="color:red;"> SOLD </h3> <?php
                            }else{echo "Price: &euro;" . $row2["p_price"];} ?>
                        </h3>
                    </a>
                    <?php }} ?>
            </div>

            <div>
                <?php
                $query3 = "SELECT * FROM paintingsrow3 ORDER BY id ASC";
                $result3 = mysqli_query($con, $query3);

                if(mysqli_num_rows($result3) > 0)
                {
                while($row3 = mysqli_fetch_array($result3))
                {
                ?>
                <form method="post" action="index.php?action=add&id=<?php echo $row3["id"]; ?>">
                    <a href="<?php echo $row3["f_image"]; ?>">
                        <img src="<?php echo $row3["image"]; ?>" alt="" />
                        <h3><?php echo $row3["description"]; ?>cm</h3>
                        <h3><?php
                            if ($row3["p_price"] == 0){
                                ?><h3 style="color:red;"> SOLD </h3> <?php
                            }else{echo "Price: &euro;" . $row3["p_price"]; } ?>
                        </h3>
                    </a>
                    <?php }} ?>
            </div>


        </section>

    </section>

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