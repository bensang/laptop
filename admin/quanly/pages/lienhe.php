<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Liên hệ
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Nội dung</th>
                                <th>Ngày liên hệ</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$stt = 0;
$lienhe = lienhe();
while($row = mysqli_fetch_assoc($lienhe)){
    $stt++;
?>
<tr class="odd gradeX" align="center">
    <td><?php echo $stt ?></td>
    <td><?php echo $row['hoten'] ?></td>
    <td><?php echo $row['noidung'] ?></td>
    <td><?php echo $row['ngaylienhe'] ?></td>
    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?p=lienhe_del&id_lienhe=<?php echo $row['id_lienhe'] ?>"> Delete</a></td>
</tr>
<?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>