<?php
session_start();
    require "quanly/lib/db.php";
if (isset($_SESSION['user'])) {
    header("location: quanly/index.php");
}
?>
<?php
$loi = "";
if (isset($_POST['btnLogin'])) {
    global $conn;
    $user = mysqli_real_escape_string($conn,strip_tags(trim($_POST['txtUser'])));
    $pass = mysqli_real_escape_string($conn,strip_tags(trim($_POST['txtPassword'])));
    $pass = md5($pass);
    $test = "SELECT * FROM thanhvien WHERE user = '$user' AND pass = '$pass' ";
    $logintest = mysqli_query($conn, $test);
    if (mysqli_num_rows($logintest) == 1 ) {
        $row = mysqli_fetch_assoc($logintest);
        if ($row['capquyen'] == 1) {
            $_SESSION['user'] = $row['user'];
            $_SESSION['hoten'] = $row['hoten'];
            header("location: quanly/index.php");
        }else{
            $loi = "Bạn Không Phải Admin";
        }
    }else{
        $loi = "Email không trùng khớp";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="Vu Quoc Tuan">

    <title>Admin - Khoa Phạm</title>

    <!-- Bootstrap Core CSS -->
    <link href="quanly/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="quanly/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="quanly/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="quanly/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
<?php
if ($loi != "") {
?>
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <?php echo $loi ?>
    </div>
<?php } ?>
                        <form role="form" action="" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="txtUser" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="txtPassword" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block" name="btnLogin">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="quanly/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="quanly/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="quanly/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="quanly/dist/js/sb-admin-2.js"></script>

</body>

</html>
