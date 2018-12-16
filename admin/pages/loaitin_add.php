<?php
$loi = "";
if (isset($_POST['btnAdd'])) {
    $idTL = $_POST['sltTheLoai'];
    $TenLT = $_POST['txtCateName'];
    $TenLT_KD = changeTitle($TenLT);
    $AnHien = $_POST['rdoStatus'];
    $test = "SELECT * FROM loaitin WHERE Ten = '$TenLT' ";
    $testLT = mysql_query($test);
    if (mysql_num_rows($testLT) == 0) {
        $qr = "INSERT INTO loaitin VALUES(null, '$TenLT', '$TenLT_KD',0,'$AnHien','$idTL'  ) ";
        mysql_query($qr);
    }else{
        $loi = "Loại Tin Đã Có, Vui Lòng Nhập Lại";
    }
}
?>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Loại Tin
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" name="sltTheLoai">
                                    <option value="0">Please Choose Category</option>
<?php
$theloai = theloai();
while($row = mysql_fetch_assoc($theloai)){
?>
                                    <option value="<?php echo $row['idTL'] ?>"><?php echo $row['TenTL'] ?></option>
<?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại Tin</label>
                                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
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
                            <button type="submit" class="btn btn-default" name="btnAdd">Category Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->