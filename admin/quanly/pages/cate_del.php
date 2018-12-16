<?php
$id_nhom = $_GET['id_nhom'];
settype($id_nhom, 'int');
global $conn;
$qr = "DELETE FROM nhomsanpham WHERE id_nhom = '$id_nhom' ";
mysqli_query($conn, $qr);
header("location: index.php?p=cate_list");
?>