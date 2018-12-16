<?php
ob_start();
session_start();

require "lib/db.php";
require "lib/func.php";
require "lib/functions.php";
?>
<?php
if (isset($_GET['p'])) {
    $p = $_GET['p'];
}else{
    $p = "";
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
    <title>Admin - SangPC</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="js/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="js/ckfinder/ckfinder.js" type="text/javascript"></script>

<script type="text/javascript">
    var url = document.URL;
    var root = location.protocol + '//' + location.host;

    var param = document.URL.split('.html')[0];
    var res = param.split(root+"/");
    res = res[1].split("/");
var baseURL = "http://localhost/"+res[0]+"/"+res[1]+"/nangcao/admin/quanly/";

    $(document).ready(function() {
        $("#sltNhom").change(function() {
            var idNhom = $(this).val();
            $.get('pages/loaisp_ajax.php',{nhom:idNhom} ,function(data) {
                $("#sltLoai").html(data);
            });
        });
    });
</script>

<script src="js/func_ckfinder.js" type="text/javascript"></script>

</head>

<body>


    <div id="wrapper">

        <!-- Navigation -->
    <?php require "blocks/menu.php" ?>

<?php
switch ($p) {
    case 'cate_add': require "pages/cate_add.php"; break;
    case 'cate_edit': require "pages/cate_edit.php"; break;
    case 'cate_list': require "pages/cate_list.php"; break;
    case 'cate_del': require "pages/cate_del.php"; break;

    case 'product_add': require "pages/product_add.php"; break;
    case 'product_edit': require "pages/product_edit.php"; break;
    case 'product_list': require "pages/product_list.php"; break;
	case 'product_del': require "pages/product_del.php"; break;

    case 'loai_add': require "pages/loai_add.php"; break;
    case 'loai_edit': require "pages/loai_edit.php"; break;
    case 'loai_list': require "pages/loai_list.php"; break;
    case 'loai_del': require "pages/loai_del.php"; break;

    case 'user_add': require "pages/user_add.php"; break;
    case 'user_edit': require "pages/user_edit.php"; break;
    case 'user_list': require "pages/user_list.php"; break;
	case 'user_del': require "pages/user_del.php"; break;

    case 'logout': require "pages/logout.php"; break;
    case 'lienhe': require "pages/lienhe.php"; break;
	case 'lienhe_del': require "pages/lienhe_del.php"; break;
    case 'hoadon_list': require "pages/hoadon_list.php"; break;
    case 'hoadon_del': require "pages/hoadon_del.php"; break;
    default: require "pages/cate_list.php"; break;
}
?>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
