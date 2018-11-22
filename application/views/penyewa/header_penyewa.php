<html>
<head>
	
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<style type="text/css">
		.navbar{
			background: white;
			font-size: 20px;
			font-family: 'Poppins', sans-serif;
			border-bottom-style: solid;
		}
		.navtext{
			height: auto;
			width: 600px;
			margin-left : -18%;

		}
		#logo{
			text-decoration : none;
			font-size : 29px;
			font-weight : bold;
			margin-left : 4%;
		}
		
	</style>
</head>
<body>
	<nav class="navbar fixed-top">
		<a href="<?php echo site_url('C_penyewa/home_penyewa');?>" id="logo"><span style="color : #49874B">#</span><span style="color : black;">futsal</span></a>
		<div class="navtext">
			<a href="<?php echo site_url('C_penyewa/CekBooking_penyewa');?>" style="text-decoration: none; color: black; margin-right: 5%;"><span>Cek Booking</span></a>
			<a href="<?php echo site_url('C_penyewa/konfirmasi_penyewaan/'.$id.'');?>" style="text-decoration: none; color: black; margin-right: 5%;"><span>Konfirmasi</span></a>
		</div>
		<div class="dropdown" style="margin-right: 14%;">
			<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<?php echo $sess['nama_penyewa']; ?>
			</button>
			<div class="dropdown-menu" style="margin-top : 10%;">
				<a class="dropdown-item" href="#">Pengaturan</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="<?php echo site_url('C_penyewa/logout');?>"><span class="fa fa-sign-out">Keluar</span></a>
			</div>
		</div>
	</nav>
</body>
</html>