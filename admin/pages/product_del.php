<?php
$idTin = $_GET['idTin'];
settype($idTin, 'int');
$qr = "DELETE FROM tin WHERE idTin = '$idTin' ";
mysql_query($qr);
header('location: index.php?p=product_list');
?>