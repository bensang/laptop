<?php
ob_start();
?>

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<?php
$ok=1;
 if(isset($_SESSION['giohang']))
 {
  foreach($_SESSION['giohang'] as $k=>$v)
  {
   if(isset($v))
   {
   $ok=2;
   }
  }
 }
 if ($ok != 2)
  {
  echo '<p>Bạn không có món hàng nào trong giỏ hàng</p>';
 } else {
  $items = $_SESSION['giohang'];
  //echo '<p>Ban dang co <a href="">'.count($items).' mon hang trong gio hang</a></p>';
 }
?>

<?php
$ok=1;
if(isset($_SESSION['giohang']))
{
 foreach($_SESSION['giohang'] as $k => $v)
 {
  if(isset($k))
  {
   $ok=2;
  }
 }
}
if($ok == 2)
{
   foreach($_SESSION['giohang'] as $key=>$value)
   {
    $item[]=$key;
   }
   $total = 0;
   $str=implode(",",$item);
   global $conn;
   $sql="select * from sanpham where id in ($str)";
   $query=mysqli_query($conn, $sql);
   while($row=mysqli_fetch_array($query))
   {
?>
			<div class="table-responsive cart_info">
				<form action="index.php" method="post">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					
					<tbody>
                    
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/<?php echo $row['hinh']?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $row['tensp']?></a></h4>
								<p>Web ID: <?php echo $row['id']?></p>
							</td>
							<td class="cart_price">
								<p><?php echo number_format($row['gia'],0,'',',')?> VND</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input class="cart_quantity_input" type="text" name="qty[<?php echo $row['id'] ?>]" value="<?php echo $_SESSION['giohang'][$row['id']]?>" autocomplete="off" size="2">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo number_format($row['gia']*$_SESSION['giohang'][$row['id']],0,'',',')?> VND</p>
							</td>
							<td><div><a class="cart_del" href="?delcart=<?php echo $row['id']?>"> X </a></div></td>
						</tr>

					<?php $total+=$_SESSION['giohang'][$row['id']]*$row['gia']; }?>	
					</tbody>

				</table>
				<input type='submit' class="btn btn-info" name='update' value='Cập Nhật Giỏ Hàng'>
				<input type='submit' class="btn btn-danger" name='thanhtoan' value='Thanh Toán'>
                    </form>
                <h3 style="text-align:center ;color:#F00">Tổng tiền: <?php echo number_format($total,0,'',',')?> VND</h3>

                <?php } ?>
			</div>
		</div>
	</section> <!--/#cart_items-->