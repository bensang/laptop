<?php
$idTin = $_GET['idTin'];
settype($idTin, 'int');
$row = editTin($idTin);
?>
<?php 
if(isset($_POST['btnEdit'])){
	$idTL = $_POST['sltTheLoai'];
	$idLT = $_POST['sltLoaitin'];
	$TieuDe = $_POST['txtName'];
	$TieuDe_KD = changeTitle($TieuDe);
	$TomTat = $_POST['txtIntro'];
	$NoiDung = $_POST['txtContent'];
	$Hinh = $_POST['fImages'];
	$AnHien = $_POST['rdoStatus'];
	$qr = "UPDATE tin SET TieuDe ='$TieuDe', TieuDe_KhongDau='$TieuDe_KD', TomTat='$TomTat', Content='$NoiDung', urlHinh='$Hinh', AnHien='$AnHien', idLT ='$idLT', idTL='$idTL' WHERE idTin ='$idTin'";
	mysql_query($qr);
	header("location: index.php?p=product_list");
}
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" id="sltTheLoai" name="sltTheLoai">
<?php
$theloai = theloai();
while($rowTL = mysql_fetch_assoc($theloai)){
?>
                                    <option value="<?php echo $rowTL['idTL'] ?>"><?php echo $rowTL['TenTL'] ?></option>
<?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại Tin</label>
                                <select class="form-control" id="sltLoaitin" name="sltLoaitin">
<?php
$loaitin = loaitin();
while($rowLT = mysql_fetch_assoc($loaitin)){
?>
                                    <option value="<?php echo $rowLT['idLT'] ?>"><?php echo $rowLT['Ten'] ?></option>
<?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input class="form-control" name="txtName" value="<?php echo $row['TieuDe'] ?>" />
                            </div>
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea class="form-control" rows="3" name="txtIntro"><?php echo $row['TomTat'] ?></textarea>
                                <script type="text/javascript">ckeditor("txtIntro")</script>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control" rows="3" name="txtContent"><?php echo $row['Content'] ?></textarea>
                                <script type="text/javascript">ckeditor("txtContent")</script>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <img src="<?php echo $row['urlHinh'] ?>" width="03%">
                                <input type="file" name="fImages">
                            </div>
                            <div class="form-group">
                                <label>Ẩn/Hiện</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio">Invisible
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default" name="btnEdit">Product Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>