<div class="left-sidebar">
<?php
$nhomsanpham = nhomsanpham();
while($row = mysqli_fetch_assoc($nhomsanpham)){
	$id_nhom = $row['id_nhom']
?>
						<h2><?php echo $row['tennhom']?></h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php 
							$loaisanpham = loaisanpham($id_nhom);
							while($row1 = mysqli_fetch_assoc($loaisanpham)){
							?>
                            <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="index.php?p=sanpham&id_loai=<?php echo $row1['id_loai'] ?>"><?php echo $row1['tenloaisp'] ?></a></h4>
								</div>
							</div>
							<?php }?>
						</div><!--/category-products-->
						<?php }?>
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>