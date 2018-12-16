<?php
$id_loai = $_GET['id_loai'];
settype($id_loai, 'int');
$row = editLoai($id_loai);
?>
<?php
if (isset($_POST['btnEdit'])) {
    $idNhom = $_POST['sltNhom'];
    $TenLoai = $_POST['txtCateName'];
    global $conn;
    $qr = "UPDATE loaisanpham SET id_nhom = '$idNhom',tenloaisp = '$TenLoai' WHERE id_loai = '$id_loai' ";
    mysqli_query($conn, $qr);
    header("location: index.php?p=loai_list");
}
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa Loại Sẩn Phẩm
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Nhóm sản phẩm</label>
                                <select class="form-control" name="sltNhom">
<?php
$nhom = nhomsanpham();
while($rownhom = mysqli_fetch_assoc($nhom)){
?>
                                    <option value="<?php echo $rownhom['id_nhom'] ?>" <?php if($row['id_nhom']==$rownhom['id_nhom']){echo "selected";} ?> ><?php echo $rownhom['tennhom'] ?></option>
<?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên Loại</label>
                                <input class="form-control" name="txtCateName" value="<?php echo $row['tenloaisp'] ?>" />
                            </div>
                            
                            <button type="submit" class="btn btn-default" name="btnEdit">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>