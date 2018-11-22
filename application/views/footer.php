<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		#footer{
			background: white;
			position:absolute;
			width : 100%;
			padding-top: 18px;
			margin-top: 40px;
			font-family: 'Poppins', sans-serif;
			border-top: 1px solid black;
		}
		a{
			text-decoration : none;
		}
		.sm{
			width : 30px;
			height : 30px;
		}
		.sm1{
			margin-right : 5%;
		}
		.small-icon{
			width : 20px;
			height : 20px;
			margin-right : 3%;
		}
		.mid-footer{
			margin-top : 2%;	
		}
		.footer-b{
			margin-top : 3%;
			padding-bottom : 2%;
		}
	</style>
</head>
<body>
	<div id="footer">
		<div class="container footer-b">
			<div class="row">
				<div class="col-md-4">
					<p><span>#</span>Futsal</p>
					<p>About Us &sdot;  FAQ &sdot; Contact Us
				</div>
				<div class="col-md-1">
				</div>
				<div class="col-md-3 mid-footer">
					<a href="" ><img class="sm sm1" src="<?php echo base_url('assets/simbol/facebook-logo-button.png');?>"></a>
					<a href="" ><img class="sm sm1" src="<?php echo base_url('assets/simbol/twitter-logo-button.png');?>"></a>
					<a href="" ><img class="sm" src="<?php echo base_url('assets/simbol/instagram-logo.png');?>"></a>
				</div>
				<div class="col-md-1"> 
				</div>
				<div class="col-md-3">
					<p><img class="small-icon" src="<?php echo base_url('assets/simbol/close-envelope.png');?>"><span>saran@futsal.com</span></p>
					<p><img class="small-icon" src="<?php echo base_url('assets/simbol/whatsapp-logo.png');?>"><span>0812-3212-1545</span></p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>