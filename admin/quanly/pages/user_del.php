<?php 
$user = $_GET['user'];
global $conn;
$qr = "DELETE FROM thanhvien WHERE user = '$user' ";
mysqli_query($conn, $qr);
header("location: index.php?p=user_list");
?>