<?php
require "../lib/db.php";
require "../lib/func.php";
?>
<?php
$idTL = $_GET['theloai'];
settype($idTL, 'int');
$loaitin = loaitin_ajax($idTL);
while($row = mysql_fetch_assoc($loaitin)){
?>
<option value="<?php echo $row['idLT'] ?>"><?php echo $row['Ten'] ?></option>
<?php } ?>