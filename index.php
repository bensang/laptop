<?php
session_start();
ob_start();
require "lib/db.php";
require "lib/func.php";
if (isset($_GET['p'])) {
    $p = $_GET['p'];
}else{
    $p ="";
}
?>
<?php
if(isset($_GET['themgiohang'])){
	$id = $_GET['themgiohang'];
	if(isset($_SESSION['giohang'][$id])){
		$qty = $_SESSION['giohang'][$id] + 1;
	}
	else
	{
 		$qty=1;
	}
	$_SESSION['giohang'][$id]=$qty;
	header("location: index.php?p=giohang");
	exit();	
}
if(isset($_SESSION['giohang'])){
	if(isset($_GET['xoagiohang'])){
		$id = $_GET['xoagiohang'];
		for($i = 0; $i < count($_SESSION['giohang']); $i++){
			if($_SESSION['giohang'][$i]['id'] == $id){
				$_SESSION['giohang'][$i]['soluong'] = $_SESSION['giohang'][$i]['soluong'] - 1;	
			}
		}
		header("location: index.php?p=giohang");	
	}
	if(isset($_GET['conggiohang'])){
		$id = $_GET['conggiohang'];
		for($i = 0; $i < count($_SESSION['giohang']); $i++){
			if($_SESSION['giohang'][$i]['id'] == $id){
				$_SESSION['giohang'][$i]['soluong'] = $_SESSION['giohang'][$i]['soluong'] + 1;	
			}
		}
		header("location: index.php?p=giohang");	
	}
	if(isset($_GET['delcart'])){
		$id = $_GET['delcart'];
		if($id == 0)
		{
 			unset($_SESSION['giohang']);
		}
		else
		{
			unset($_SESSION['giohang'][$id]);
		}
		header("location:index.php?p=giohang");
	}
	if(isset($_POST['update']))
	{
 		foreach($_POST['qty'] as $key=>$value)
 		{
  			if( ($value == 0) and (is_numeric($value)))
  			{
   				unset ($_SESSION['giohang'][$key]);
  			}
  			elseif(($value > 0) and (is_numeric($value)))
  			{
   				$_SESSION['giohang'][$key]=$value;
  			}
 		}
 		header("location:index.php?p=giohang");
	}
	if(isset($_POST['thanhtoan']))
	{
 		header("location:index.php?p=thanhtoan");
	}
}
?>
<?php
if(isset($_POST['btnLogin'])){
	$user = mysqli_real_escape_string($conn,strip_tags(trim($_POST['user'])));
    	$pass = mysqli_real_escape_string($conn,strip_tags(trim($_POST['pass'])));
	$pass = md5($pass);
	global $conn;
	$qr = "SELECT * FROM thanhvien WHERE user = '$user' AND pass = '$pass'";
	$test = mysqli_query($conn, $qr);
	if(mysqli_num_rows($test)==1){
		$row = mysqli_fetch_assoc($test);
		$_SESSION['user'] = $row['user'];
		$_SESSION['pass'] = $row['pass'];
	}
}
?>
<?php
if(isset($_POST['btnLogout'])){
	unset($_SESSION['user']);
	unset($_SESSION['pass']);	
}
?>
<?php
$loi = "";
if (isset($_POST['btnDK'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
	$pass = md5($pass);
	global $conn;
    $test = "SELECT * FROM thanhvien WHERE user = '$user' ";
    $testUser = mysqli_query($conn, $test);
    if (mysqli_num_rows($testUser) == 0) {
        $qr = "INSERT INTO thanhvien VALUES('No Name','No Name','a@gmail.com',0, '$user','$pass',1,1) ";
        mysqli_query($conn, $qr);
    }else{
        $loi = "Thành viên Đã Có, Vui Lòng Nhập Lại";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
   <?php require "blocks/header.php"?>
   <?php
	if (file_exists("pages/$p.php")) {
		require "pages/$p.php"; 
	}else{
		require "pages/index.php";
	}
	?>
	<?php require "blocks/footer.php"?>
    <script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>