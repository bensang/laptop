<?php
$loi = "";
if (isset($_POST['btnAdd'])) {
    $idNhom = $_POST['sltNhom'];
    $idLoai = $_POST['sltLoai'];
    $TenSP = $_POST['txtName'];
    $Gia = $_POST['txtPrice'];
    $Mota =  $_POST['txtIntro'];
    $id = rand(1,10000);
    global $conn;
    $test = "SELECT * FROM sanpham WHERE id = '$id' ";
    $sanpham = mysqli_query($conn, $test);
    if($_FILES['fImages']['type'] == "image/jpeg"|| $_FILES['fImages']['type'] == "image/png"|| $_FILES['fImages']['type'] == "image/gif"||$_FILES['fImages']['type'] == "image/jpg"){ 
          $Hinh = $_FILES['fImages']['name'];
          move_uploaded_file($_FILES['fImages']['tmp_name'], './upload/'.$_FILES['fImages']['name']);
          copy('./upload/'.$_FILES['fImages']['name'], '../../images/'.$_FILES['fImages']['name']);
    }else{
      $loi = "đây không phải file hình, vui lòng chọn lại hình.";
    }
    
    if (mysqli_num_rows($sanpham) == 0  ) {
        if ($TenSP != "") {
            $qr = "INSERT INTO sanpham VALUES ('$id','$idLoai', '$TenSP','$Mota','$Hinh','$Gia','new',0,0)";
            mysqli_query($conn, $qr);
            $loi = "Thêm sản phẩm thành công";
        }else{
            $loi = "Vui Lòng Nhập Tên SP";
        }   
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
                        <h1 class="page-header">Thêm Sản Phẩm
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nhóm</label>
                                <select class="form-control" name="sltNhom" id="sltNhom">
                                    <option value="0">Vui Lòng Chọn Nhóm</option>
<?php
$nhom = nhomsanpham();
while($row = mysqli_fetch_assoc($nhom)){
?>
                                    <option value="<?php echo $row['id_nhom'] ?>"><?php echo $row['tennhom'] ?></option>
<?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại</label>
                                <select class="form-control" name="sltLoai" id="sltLoai">
                                    <option value="0">Vui Lòng Chọn Loại</option>
<?php
$loaisp = loaisp();
while($row = mysqli_fetch_assoc($loaisp)){
?>
                                    <option value="<?php echo $row['id_loai'] ?>"><?php echo $row['tenloaisp'] ?></option>
<?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên SP</label>
                                <input class="form-control" name="txtName" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" name="txtPrice" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Mô Tả</label>
                                <textarea class="form-control" rows="3" name="txtIntro"></textarea>

<script type="text/javascript">ckeditor("txtIntro")</script>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages">
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
        <!-- /#page-wrapper -->