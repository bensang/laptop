<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhóm sản phẩm
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$stt = 0;
$nhomsanpham = nhomsanpham();
while($row = mysqli_fetch_assoc($nhomsanpham)){
    $stt++;
?>
<tr class="odd gradeX" align="center">
    <td><?php echo $stt ?></td>
    <td><?php echo $row['tennhom'] ?></td>
    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?p=cate_del&id_nhom=<?php echo $row['id_nhom'] ?>"> Delete</a></td>
    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?p=cate_edit&id_nhom=<?php echo $row['id_nhom'] ?>">Edit</a></td>
</tr>
<?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>