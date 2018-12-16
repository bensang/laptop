<?php
$loi = "";
if (isset($_POST['btnThanhToan'])) {
	$act=$_POST["btnThanhToan"];
    $ten = $_POST['ten'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $now=date("Y-m-d H:i:s");
    if(isset($act)){
    	global $conn;
    	foreach ($_SESSION['giohang'] as $key => $value) {
    	$sanpham = chitietsp($key);
		$row = mysqli_fetch_assoc($sanpham);
		$gia = $row['gia']*$_SESSION['giohang'][$key];
		$qr ="INSERT INTO hoadon VALUES ( null, '$ten', '$diachi', '$email', '$dienthoai', 0, 'CTY', '$key', '$value', '$gia', '$now','sold') ";
		$kq=mysqli_query($conn, $qr);
		}
		
    	//$qr = "INSERT INTO hoadon VALUES ( null, '$ten', '$diachi', '$email', '$dienthoai', 0, 'CTY', 1, 1, 1, '$now','sold') ";
    	//$kq=mysqli_query($conn, $qr);
    	if(!$kq)
			{
			$loi = "Nhập sai, vui lòng nhập lại";		
			}
		else 
			{
			$loi = "Cảm ơn bạn đã mua hàng tại SangPC";
			$act=""; $ten=""; $email="";$diachi="";$dienthoai="";
			unset($_SESSION['giohang']);			
			}
    }
}
?>
<?php 
	if(isset($_POST['btnQuaylai']))
	{
 		header("location:index.php?p=giohang");
	}
?>
<div class="login-form" style="margin-left: 500px; margin-right: 500px"><!--login form-->
<h2 style="margin-left:60px">Nhập thông tin cá nhân</h2>
<?php
if ($loi != "") {
?>
<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Success!</strong> <?php echo $loi ?>
</div>
<?php } ?>
<form action="" method="post">
    <input type="text" name="ten" placeholder="Họ tên" />
    <input type="text" name="diachi" placeholder="Địa chỉ" />
    <input type="email" name="email" placeholder="Email" />
    <input type="text" name="dienthoai" placeholder="Phone" />
    <button type="submit" class="btn btn-danger" name="btnQuaylai" style="display:inline;margin-left:70px">Quay lại</button>
    <button type="submit" class="btn btn-danger" name="btnThanhToan" style="display:inline;margin-left:12px">Lưu</button>
</form>
</div><!--/login form-->
<br />