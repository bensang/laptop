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
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                    	
                        <h2 class="title text-center"><?php echo $row1['tenloaisp']?></h2>
                        <?php
						$tukhoa = $_GET['q'];
						$sptheoloai = timkiem($tukhoa);
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
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>