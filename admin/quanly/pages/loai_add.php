<?php
$loi = "";
if (isset($_POST['btnAdd'])) {
    $id_nhom = $_POST['sltNhom'];
    $TenLoai = $_POST['txtCateName'];
	$ghichu = '';
    global $conn;
    $test = "SELECT * FROM loaisanpham WHERE tenloaisp = '$TenLoai' ";
    $testLoai = mysqli_query($conn, $test);
    if (mysqli_num_rows($testLoai) == 0) {
        $qr = "INSERT INTO loaisanpham VALUES(null, '$id_nhom', '$TenLoai','$ghichu') ";
        mysqli_query($conn, $qr);
        $loi = "Thêm Thể Loại Thành Công";
    }else{
        $loi = "Loại Đã Có, Vui Lòng Nhập Lại";
    }
}
?>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Loại sản phẩm
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
                            <div class="form-group">
                                <label>Nhóm sản phẩm</label>
                                <select class="form-control" name="sltNhom">
                                    <option value="0">Please Choose Category</option>
<?php
$nhom = nhomsanpham();
while($row = mysqli_fetch_assoc($nhom)){
?>
                                    <option value="<?php echo $row['id_nhom'] ?>"><?php echo $row['tennhom'] ?></option>
<?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại Sản Phẩm</label>
                                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
                            </div>
                            
                            <button type="submit" class="btn btn-default" name="btnAdd">Thêm Loại</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->