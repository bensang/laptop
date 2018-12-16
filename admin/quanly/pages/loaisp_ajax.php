<?php
require "../lib/db.php";
require "../lib/func.php";
?>
<?php
$idNhom = $_GET['nhom'];
settype($idNhom, 'int');
$loaisp = loaisp_ajax($idNhom);
while($row = mysqli_fetch_assoc($loaisp)){
?>
<option value="<?php echo $row['id_loai'] ?>"><?php echo $row['tenloaisp'] ?></option>
<?php } ?>