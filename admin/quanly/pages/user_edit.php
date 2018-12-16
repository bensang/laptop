<?php
$user=$_GET['user'];
$row = editUser($user);	
?>
<?php
if (isset($_POST['btnEdit'])) {
    $user = $_POST['txtUser'];
    $pass = $_POST['txtPass'];
	$pass = md5($pass);
    global $conn;
    $qr = "UPDATE thanhvien SET pass = '$pass' WHERE user = '$user' ";
    mysqli_query($conn, $qr);
    header("location: index.php?p=user_list");
}
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Sửa Thành Viên
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="txtUser" value="<?php echo $row['user']?>" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="txtPass" value="<?php echo md5($row['pass'])?>" />
                            </div>
                            
                            <button type="submit" class="btn btn-default" name="btnEdit">User Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>