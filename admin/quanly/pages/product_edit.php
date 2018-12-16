<?php
$id = $_GET['id'];
settype($id, 'int');
$row = editSP($id);
?>
<?php 
if(isset($_POST['btnEdit'])){
	$TenSP = $_POST['txtName'];
	$Mota = $_POST['txtIntro'];
	$Gia = $_POST['txtPrice'];
    global $conn;
    if($_FILES['fImages']['type'] == "image/jpeg"|| $_FILES['fImages']['type'] == "image/png"|| $_FILES['fImages']['type'] == "image/gif"||$_FILES['fImages']['type'] == "image/jpg"){ 
          $Hinh = $_FILES['fImages']['name'];
          move_uploaded_file($_FILES['fImages']['tmp_name'], './upload/'.$_FILES['fImages']['name']);
          copy('./upload/'.$_FILES['fImages']['name'], '../../images/'.$_FILES['fImages']['name']);
    }else{
      $loi = "đây không phải file hình, vui lòng chọn lại hình.";
    }
	$qr = "UPDATE sanpham SET tensp ='$TenSP', mota='$Mota', hinh='$Hinh',gia='$Gia' WHERE id ='$id'";
	mysqli_query($conn, $qr);
	header("location: index.php?p=product_list");
}
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Sửa sản phẩm
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label>Tên SP</label>
                                <input class="form-control" name="txtName" value="<?php echo $row['tensp'] ?>" />
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" name="txtPrice" value="<?php echo $row['gia']?>" />
                            </div>
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea class="form-control" rows="3" name="txtIntro"><?php echo $row['mota'] ?></textarea>
                                <script type="text/javascript">ckeditor("txtIntro")</script>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <img src="upload/<?php echo $row['hinh'] ?>" width="03%">
                                <input type="file" name="fImages">
                            </div>
                            <button type="submit" class="btn btn-default" name="btnEdit">Product Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>