<?php
$loi = "";
if (isset($_POST['btnAdd'])) {
    $idTL = $_POST['sltTheLoai'];
    $idLT = $_POST['sltLoaitin'];
    $TieuDe = $_POST['txtName'];
    $TieuDe_KD = changeTitle($TieuDe);
    $TomTat = $_POST['txtIntro'];
    //$Hinh = $_POST['fImages'];
    $Content = $_POST['txtContent'];
    if($_FILES['fImages']['type'] == "image/jpeg"|| $_FILES['fImages']['type'] == "image/png"|| $_FILES['fImages']['type'] == "image/gif"||$_FILES['fImages']['type'] == "image/jpg"){ 
          $Hinh = "upload/".$_FILES['fImages']['name'];
          move_uploaded_file($_FILES['fImages']['tmp_name'], './upload/'.$_FILES['fImages']['name']);
    }else{
      // không phải file ảnh
      $loi = "đây không phải file hình, vui lòng chọn lại hình.";
    }
    if ($TieuDe != "") {
        $qr = "INSERT INTO tin VALUES(null, '$TieuDe','$TieuDe_KD','$TomTat','$Hinh',0,0,'$Content','$idLT','$idTL',0,0,1) ";
        mysql_query($qr);
    }else{
        $loi = "Vui Lòng Nhập Tiêu đề";
    }
}
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Tin Tức
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
                                <input class="form-control" name="txtName" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea class="form-control" rows="3" name="txtIntro"></textarea>
                                <script type="text/javascript">ckeditor("txtIntro")</script>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control" rows="3" name="txtContent"></textarea>
                                <script type="text/javascript">ckeditor("txtContent")</script>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
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
                            <button type="submit" class="btn btn-default" name="btnAdd">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>