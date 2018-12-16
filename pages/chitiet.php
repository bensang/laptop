<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
settype($id, 'int');
}
?>
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php require "blocks/sidebar.php"?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
                    	<?php
                        	$chitietsp = chitietsp($id);
							$row = mysqli_fetch_assoc($chitietsp);
						?>
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/<?php echo $row['hinh']?>" alt="" />
								
							</div>
							

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $row['tensp']?></h2>
								<p>Web ID: <?php echo $row['id']?></p>
								<span>
									<span><?php echo number_format($row['gia'],0,'',',')?> VND</span>
									
    								<a href="?themgiohang=<?php echo $row['id']?>"><button type='button' class='btn btn-fefault cart'>
										<i class='fa fa-shopping-cart'></i>
										Thêm vào giỏ hàng
									</button></a>
								</span>
								
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								
								<li class="active"><a href="#reviews" data-toggle="tab">Mô tả sản phẩm</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									
									<p><?php echo $row['mota']?></p>
									
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm khác</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
                                <?php
                                $spcungnhom = spcungnhom($id, $row['id_loai']);
								while($row1 = mysqli_fetch_assoc($spcungnhom)){
								?>	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													
                                                    <a href="index.php?p=chitiet&id=<?php echo $row1['id']?>"><img src="images/<?php echo $row1['hinh']?>" alt="" /></a>
													<h2><?php echo number_format($row1['gia'],0,'',',')?> VND</h2>
													<p><?php echo $row1['tensp']?></p>
													
												</div>
											</div>
										</div>
									</div>
								<?php }?>	
								</div>
								
							</div>
							 			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>