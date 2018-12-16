<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hóa đơn
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Địa chỉ</th>
                                <th>Email</th>
                                <th>Điện thoại</th>
                                <th>Mã sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Delete<th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$hoadon = hoadon();
while($row = mysqli_fetch_assoc($hoadon)){
?>
<tr class="odd gradeX" align="center">
    <td><?php echo $row['id_hoadon'] ?></td>
    <td><?php echo $row['hoten'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['tongtien'] ?></td>
    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?p=hoadon_del&id_hoadon=<?php echo $row['id_hoadon'] ?>"> Delete</a></td>
</tr>
<?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>