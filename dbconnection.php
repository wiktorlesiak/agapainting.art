<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'root');
define('DB_NAME', 'agnieszkalesiak');
/**
define('DB_SERVER','sql210.epizy.com');
define('DB_USER','epiz_27509412');
define('DB_PASS' ,'MXktVdZG0YKB3M');
define('DB_NAME', 'epiz_27509412_agnieszkalesiak');
**/

$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>

