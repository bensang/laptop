<?php 
require "blocks/slider.php"
?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php 
					if(!isset($_SESSION['user'])){
						require "blocks/dangnhap.php";                    
                    }else{
						require "blocks/dangxuat.php";	
					}
					?>
					<?php require "blocks/sidebar.php"?>
				</div>
				<div class="col-sm-9 padding-right">
					<?php 
					$loaisp = sptrangchu();
					while($row = mysqli_fetch_assoc($loaisp)){
						$id_loai=$row["id_loai"]
					?>
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="index.php?p=sanpham&id_loai=<?php echo $row['id_loai'] ?>"><?php echo $row['tenloaisp']?></a></li>
								
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
                            	<?php 
								$sptrangchu_3 = sptrangchu_3($id_loai);
								while($row1 = mysqli_fetch_assoc($sptrangchu_3)){
								?>
								<div class="col-sm-3">
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
					</div><!--/category-tab-->
					<?php }?>
					
				</div>
			</div>
		</div>
	</section>