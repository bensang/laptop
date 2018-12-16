<?php
$loi = "";
if (isset($_POST['btnAdd'])) {
    $TenTL = $_POST['txtCateName'];
    $TenTL_KD = changeTitle($TenTL);
    $AnHien = $_POST['rdoStatus'];
    $test = "SELECT * FROM theloai WHERE TenTL = '$TenTL' ";
    $theloai = mysql_query($test);
    if (mysql_num_rows($theloai) == 0  ) {
        $qr = "INSERT INTO theloai VALUES ( null, '$TenTL','$TenTL_KD',0,'$AnHien' ) ";
        mysql_query($qr);
        $loi = "Thêm Thể Loại Thành Công";
    }else{
        $loi = "Đã Có Thể Loại, Vui Lòng Nhập Lại";
    }
}
?>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Thể Loại
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
<?php
if ($loi != "") {
?>
<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Success!</strong> <?php echo $loi ?>
</div>
<?php } ?>
                        <form action="" method="POST">
                            <!-- <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control">
                                    <option value="0">Please Choose Category</option>
                                    <option value="">Tin Tức</option>
                                </select>
                            </div> -->
                            <div class="form-group">
                                <label>Tên Thể Loại</label>
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
                            <button type="submit" class="btn btn-default" name="btnAdd">Add</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->