<?php 
$id_loai = $_GET['id_loai'];
settype($id_loai,'int');
?>
<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php require "blocks/sidebar.php"?>
				</div>
				
				<div class="col-sm-9 padding-right" id="content">
					<div class="features_items"><!--features_items-->
                    	<?php
							$sp1trang = 3;
							if (isset($_GET['trang'])) {
								$trang = $_GET['trang'];
								settype($trang, 'int');
							}else{
								$trang = 1;
							}
							$from = ($trang - 1)*$sp1trang;
                        	$row1 = tenloaisp($id_loai)
						?>
                        <h2 class="title text-center"><?php echo $row1['tenloaisp']?></h2>
                        <?php 						
						$sptheoloai = sp1trang($id_loai, $from, $sp1trang);
						while($row = mysqli_fetch_assoc($sptheoloai)){
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="index.php?p=chitiet&id=<?php echo $row['id']?>"><img src="images/<?php echo $row['hinh']?>" alt="" /></a>
										<h2><?php echo number_format($row['gia'],0,'',',')?> VND</h2>
										<p><?php echo $row['tensp']?></p>
									</div>
								</div>
							</div>
						</div>
		<?php }?>				
						</div>
						<ul class="pagination">
							<?php 
							$sp = sptheoloai($id_loai);
							$tongsosp = mysqli_num_rows($sp);
							$tongsotrang = ceil($tongsosp/$sp1trang);
							for($i = 1; $i <= $tongsotrang; $i++){
							?>
							<li <?php if($i == $trang){echo 'class="active"';} ?>><a href="index.php?p=sanpham&id_loai=<?php echo $id_loai?>&trang=<?php echo $i?>" class="phantrang"><?php echo $i ?></a></li>
							<?php }?>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>