<?php
$loi = "";
if (isset($_POST['btnAdd'])) {
    $user = $_POST['txtUser'];
    $pass = $_POST['txtPass'];
	$pass = md5($pass);
    global $conn;
    $test = "SELECT * FROM thanhvien WHERE user = '$user' ";
    $testUser = mysqli_query($conn, $test);
    if (mysqli_num_rows($testUser) == 0) {
        $qr = "INSERT INTO thanhvien VALUES('No Name','No Name','a@gmail.com',0, '$user','$pass',1,1) ";
        mysqli_query($conn, $qr);
        header("location: index.php?p=user_list");
    }else{
        $loi = "Thành viên Đã Có, Vui Lòng Nhập Lại";
    }
}
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="txtUser" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="txtPass" />
                            </div>
                            
                            <button type="submit" class="btn btn-default" name="btnAdd">User Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>