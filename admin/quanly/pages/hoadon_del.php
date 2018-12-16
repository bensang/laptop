<?php
$id_hoadon = $_GET['id_hoadon'];
settype($id_hoadon, 'int');
global $conn;
$qr = "DELETE FROM hoadon WHERE id_hoadon = '$id_hoadon' ";
mysqli_query($conn, $qr);
header("location: index.php?p=hoadon_list");
?>