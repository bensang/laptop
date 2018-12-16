<?php
$id_nhom = $_GET['id_nhom'];
settype($id_nhom, 'int');
$row = editNhom($id_nhom);
?>
<?php
$loi = "";
if (isset($_POST['btnSua'])) {
    $TenNhom = $_POST['txtCateName'];
    global $conn;
    $qr = "UPDATE nhomsanpham SET tennhom = '$TenNhom' WHERE id_nhom = '$id_nhom' ";
    mysqli_query($conn, $qr);
    $loi = "Sửa thành công";
    header("location: index.php?p=cate_list");
}
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa Nhóm
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
            <input class="form-control" name="txtCateName" value="<?php echo $row['tennhom'] ?>" />
        </div>
                            <button type="submit" class="btn btn-default" name="btnSua">Category Edit</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>