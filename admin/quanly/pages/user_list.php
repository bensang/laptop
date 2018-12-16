<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$stt = 0;
$user = user();
while($row = mysqli_fetch_assoc($user)){
    $stt++;
?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $stt?></td>
                                <td><?php echo $row['user']?></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?p=user_del&user=<?php echo $row['user']?>"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?p=user_edit&user=<?php echo $row['user']?>">Edit</a></td>
                            </tr>
<?php }?>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>