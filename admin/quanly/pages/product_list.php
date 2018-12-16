<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Sách Sản Phẩm
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Giá</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$sanpham = sanpham();
while($row = mysqli_fetch_assoc($sanpham)){
?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['tensp'] ?></td>
                                <td><?php echo number_format($row['gia'],0,'',',')?> VND</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?p=product_del&id=<?php echo $row['id'] ?>"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?p=product_edit&id=<?php echo $row['id'] ?>">Edit</a></td>
                            </tr>
<?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>