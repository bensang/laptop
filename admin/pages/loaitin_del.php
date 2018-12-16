<?php
$idLT = $_GET['idLT'];
settype($idLT, 'int');
$qr = "DELETE FROM loaitin WHERE idLT = '$idLT' ";
mysql_query($qr);
header('location: index.php?p=loaitin_list');
?>