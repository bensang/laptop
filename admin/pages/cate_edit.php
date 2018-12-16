<?php
$idTL = $_GET['idTL'];
settype($idTL, 'int');
$row = editTL($idTL);
?>
<?php
$loi = "";
if (isset($_POST['btnSua'])) {
    $TenTL = $_POST['txtCateName'];
    $AnHien = $_POST['rdoStatus'];
    $qr = "UPDATE theloai SET TenTL = '$TenTL' WHERE idTL = '$idTL' ";
    mysql_query($qr);
    $loi = "Sửa thành công";
    header("location: index.php?p=cate_list");
}
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sua Thể Loại
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
            <label>Tên TL</label>
            <input class="form-control" name="txtCateName" value="<?php echo $row['TenTL'] ?>" />
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
                            <button type="submit" class="btn btn-default" name="btnSua">Category Edit</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>