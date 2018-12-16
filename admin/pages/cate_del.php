<?php
$idTL = $_GET['idTL'];
settype($idTL, 'int');
$qr = "DELETE FROM theloai WHERE idTL = '$idTL' ";
mysql_query($qr);
header("location: index.php?p=cate_list");
?>