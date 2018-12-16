<?php
function nhomsanpham(){
	global $conn;	
	$qr ="SELECT * FROM nhomsanpham";
	return mysqli_query($conn, $qr);
}

function hoadon(){
	global $conn;	
	$qr ="SELECT * FROM hoadon";
	return mysqli_query($conn, $qr);
}

function editNhom($id_nhom){
	global $conn;
	$qr = "SELECT * FROM nhomsanpham WHERE id_nhom = '$id_nhom' ";
	$row = mysqli_query($conn, $qr);
	return mysqli_fetch_assoc($row);
}

function editLoai($id_loai){
	global $conn;
	$qr = "SELECT * FROM loaisanpham WHERE id_loai = '$id_loai' ";
	$row = mysqli_query($conn, $qr);
	return mysqli_fetch_assoc($row);
}

function editSP($id){
	global $conn;
	$qr = "SELECT * FROM sanpham WHERE id = '$id' ";
	$row = mysqli_query($conn, $qr);
	return mysqli_fetch_assoc($row);
}


function loaisp(){
	global $conn;
	$qr = "SELECT * FROM loaisanpham";
	return mysqli_query($conn, $qr);
}

function sanpham(){
	global $conn;
	$qr = "SELECT * FROM sanpham";
	return mysqli_query($conn, $qr);
}

function loaisp_ajax($idNhom){
	global $conn;
	$qr = "SELECT * FROM loaisanpham WHERE id_nhom = '$idNhom' ";
	return mysqli_query($conn, $qr);
}

function user(){
	global $conn;
	$qr = "SELECT * FROM thanhvien";
	return mysqli_query($conn, $qr);	
}
function editUser($user){
	global $conn;
	$qr = "SELECT * FROM thanhvien WHERE user = '$user'";
	$row = mysqli_query($conn, $qr);
	return mysqli_fetch_assoc($row);	
}
function lienhe(){
global $conn;
$qr="SELECT * FROM lienhe";
return mysqli_query($conn, $qr);	
}
?>