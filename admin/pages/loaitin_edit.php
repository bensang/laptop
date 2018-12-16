<?php
$idLT = $_GET['idLT'];
settype($idLT, 'int');
$row = editLoaitin($idLT);
?>
<?php
if (isset($_POST['btnEdit'])) {
    $idTL = $_POST['sltTheLoai'];
    $TenLT = $_POST['txtCateName'];
    $TenLT_KD = changeTitle($TenLT);
    $AnHien = $_POST['rdoStatus'];
    $qr = "UPDATE loaitin SET idTL = '$idTL',Ten = '$TenLT', AnHien = '$AnHien', Ten_KhongDau = '$TenLT_KD' WHERE idLT = '$idLT' ";
    mysql_query($qr);
    header("location: index.php?p=loaitin_list");
}
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa Loại Tin
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Thế Loại</label>
                                <select class="form-control" name="sltTheLoai">
<?php
$theloai = theloai();
while($rowTL = mysql_fetch_assoc($theloai)){
?>
                                    <option value="<?php echo $rowTL['idTL'] ?>" <?php if($row['idTL']==$rowTL['idTL']){echo "selected";} ?> ><?php echo $rowTL['TenTL'] ?></option>
<?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên Loại Tin</label>
                                <input class="form-control" name="txtCateName" value="<?php echo $row['Ten'] ?>" />
                            </div>
                            <div class="form-group">
                                <label>Ẩn/Hiện</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio">Hiện
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="0" type="radio">Ẩn
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default" name="btnEdit">Category Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>