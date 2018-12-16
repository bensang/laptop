<?php
function nhomsanpham(){
	global $conn;
	$qr = "SELECT * FROM nhomsanpham";
	return mysqli_query($conn, $qr);	
}
function loaisanpham($id_nhom){
	global $conn;
	$qr = "SELECT * FROM loaisanpham WHERE id_nhom = '$id_nhom' ";
	return mysqli_query($conn, $qr);
}
function dongsanpham($id_loai){
	global $conn;
	$qr = "SELECT * FROM dongsanpham WHERE id_loai = '$id_loai' ";
	return mysqli_query($conn, $qr);
}
function tenloaisp($id_loai){
	global $conn;
	$qr = "SELECT tenloaisp FROM loaisanpham WHERE id_loai = '$id_loai' ";
	$row = mysqli_query($conn, $qr);
	return mysqli_fetch_assoc($row);	
}
function sptrangchu(){
	global $conn;
	$qr="SELECT * FROM loaisanpham WHERE id_nhom='1'";
	return mysqli_query($conn, $qr);	
}
function sptrangchu_3($id_loai){
	global $conn;
	$qr="SELECT * FROM sanpham WHERE id_loai=$id_loai ORDER BY RAND() LIMIT 0,3";
	return mysqli_query($conn, $qr);	
}
function sptheoloai($id_loai){
	global $conn;
	$qr = "SELECT * FROM sanpham WHERE id_loai = '$id_loai' ORDER BY id DESC";
	return mysqli_query($conn, $qr);	
}
function chitietsp($id){
	global $conn;
	$qr = "SELECT * FROM sanpham WHERE id = '$id'";
	return mysqli_query($conn, $qr);	
}
function spcungnhom($id, $id_loai){
	global $conn;
	$qr = "SELECT * FROM sanpham WHERE id <> $id AND id_loai = '$id_loai' ORDER BY RAND() LIMIT 0,3";
	return mysqli_query($conn, $qr);	
}
function timkiem($tukhoa){
	global $conn;
	$qr = "SELECT * FROM sanpham WHERE tensp REGEXP '$tukhoa' ORDER BY id DESC";
	return mysqli_query($conn, $qr);	
}
function sp1trang($id_loai, $from, $sp1trang){
	global $conn;
	$qr = "SELECT * FROM sanpham WHERE id_loai = '$id_loai' ORDER BY id DESC LIMIT $from,$sp1trang";
	return mysqli_query($conn, $qr);	
}
?>