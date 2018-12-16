<?php
$id_loai = $_GET['id_loai'];
settype($id_loai, 'int');
global $conn;
$qr = "DELETE FROM loaisanpham WHERE id_loai = '$id_loai' ";
mysqli_query($conn, $qr);
header('location: index.php?p=loai_list');
?>