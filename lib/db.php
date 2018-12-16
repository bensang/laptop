<?php
$conn = mysqli_connect('localhost', 'root', '', 'shop');
mysqli_set_charset($conn,"utf8");
define('ROOT', dirname(dirname(__FILE__) ) );
//$result = mysqli_query($conn, "SET NAMES 'utf8'");
//mysql_query("SET NAMES 'utf8'")
?>