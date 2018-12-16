<?php
$id = $_GET['id'];
settype($id, 'int');
global $conn;
$qr = "DELETE FROM sanpham WHERE id = '$id' ";
mysqli_query($conn, $qr);
header('location: index.php?p=product_list');
?>