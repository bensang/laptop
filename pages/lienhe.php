<?php
if (isset($_POST["act"])){
$act=$_POST["act"];
$name       = @trim(stripslashes($_POST['name'])); 
$email      = @trim(stripslashes($_POST['email'])); 
$number    = @trim(stripslashes($_POST['number'])); 
$message    = @trim(stripslashes($_POST['message']));
$now=date("Y-m-d H:i:s"); 
	if(isset($act)){   
		global $conn;
		$qr="INSERT INTO lienhe(hoten,cty,email,dienthoai,fax,diachi,noidung,ngaylienhe) VALUES('$name','ABC','$email','$number','1','abc BINH THANH','$message','$now')";
		include ROOT."/lib/PHPMailer/PHPMailerAutoload.php";
		
		$mail = new PHPMailer();
		$mail->IsSMTP(); // set mailer to use SMTP
		$mail->Host = "smtp.gmail.com"; // specify main and backup server
		$mail->Port = 465; // set the port to use
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->SMTPSecure = 'ssl';
		$mail->Username = "benvjp619@gmail.com"; //Địa chỉ gmail sử dụng để gửi email
		$mail->Password = "bensang123"; // your SMTP password or your gmail password
		$from = "benvjp619@gmail.com"; // Khi người sử dụng bấm reply sẽ gửi đến email này
		$to=$_POST["email"]; // Email người nhận (email thực)
		//$name="Hi, Mr Obama"; // Tên người nhận
		$mail->From = $from;
		$mail->FromName = "SangPC"; // Tên người gửi 
		$mail->AddAddress($to,$name);
		$mail->AddReplyTo($from,"Phòng chăm sóc khách hàng");
		$mail->WordWrap = 50; // set word wrap
		$mail->IsHTML(true); // send as HTML
		$mail->Subject = "PHAN HOI LIEN HE !";
		$mail->Body = "Bạn đã gửi liên hệ với chúng tôi là: ". $_POST["message"] ."<hr> Chúng tôi sẽ liên hệ với quý khách sớm nhất";
		$mail->SMTPDebug = 2;//Hiện debug lỗi. Mặc định sẽ tắt lỗi này
		if(!$mail->Send())
		{
			echo "<h3>Err: " . $mail->ErrorInfo . '</h3>';
		}
		else
		{
			echo "<script>alert('Cám ơn quý khách đã liên hệ với chúng tôi!');</script>";
		}
		$kq=mysqli_query($conn, $qr);	
		if(!$kq)
			{
				echo "<script>alert('Có lỗi SQL! Nhập lại!');</script>";		
			}
			else 
			{
				//echo "<script>alert('Cám ơn quý khách đã liên hệ với chúng tôi!');</script>";
			$act=""; $name=""; $email="";$message="";$number="";	
			//header("location: index.php");			
			}
    }
}
?>
<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Liên <strong>Hệ</strong></h2>		
					<div id="gmap" class="contact-map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.95520182126!2d106.67572371416003!3d10.737936192347654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad027e3727%3A0x2a77b414e887f86d!2zMTgwIMSQxrDhu51uZyBDYW8gTOG7lywgUGjGsOG7nW5nIDQsIFF14bqtbiA4LCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1542082833749" width="1140" height="385" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="number" name="number" class="form-control" required placeholder="Number Phone">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gửi" name="btnSend">
                                <input type="hidden" name="act" />
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>E-Shopper Inc.</p>
							<p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
							<p>Newyork USA</p>
							<p>Mobile: +2346 17 38 93</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: info@e-shopper.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->