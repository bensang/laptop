<?php
$loi = "";
if (isset($_POST['btnAdd'])) {
    $TenNhom = $_POST['txtCateName'];
    global $conn;
    $test = "SELECT * FROM nhomsanpham WHERE tennhom = '$TenNhom' ";
    $theloai = mysqli_query($conn, $test);
    if (mysqli_num_rows($theloai) == 0  ) {
        $qr = "INSERT INTO nhomsanpham VALUES ( null, '$TenNhom') ";
        mysqli_query($conn, $qr);
        $loi = "Thêm Nhóm Thành Công";
    }else{
        $loi = "Đã Có Nhóm, Vui Lòng Nhập Lại";
    }
}
?>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Nhóm
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
                                <label>Tên Nhóm</label>
                                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
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