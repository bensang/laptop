<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Sách Loại Tin
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên Loại Tin</th>
                                <th>Thể Loại</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$stt = 0;
$loaisp = loaisp();
while($row = mysql_fetch_assoc($loaisp)){
    $stt++;
    $id_nhom = $row['id_nhom'];
?>
    <tr class="odd gradeX" align="center">
        <td><?php echo $stt ?></td>
        <td><?php echo $row['tenloaisp'] ?></td>
<?php
$nhomsp = editLoai($id_nhom);
?>
        <td><?php echo $nhomsp['tennhom'] ?></td>
        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?p=loaitin_del&idLT=<?php echo $row['id_loai'] ?>"> Delete</a></td>
        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?p=loaitin_edit&idLT=<?php echo $row['id_loai'] ?>">Edit</a></td>
    </tr>
<?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>