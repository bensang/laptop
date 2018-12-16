<?php
$id_lienhe = $_GET['id_lienhe'];
settype($id_lienhe, 'int');
global $conn;
$qr = "DELETE FROM lienhe WHERE id_lienhe = '$id_lienhe' ";
mysqli_query($conn, $qr);
header("location: index.php?p=lienhe");
?>