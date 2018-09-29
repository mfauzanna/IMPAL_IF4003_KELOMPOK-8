<html>
<head>
	
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<style type="text/css">
		.navbar{
			background: rgba(210,210,210,0.9);
			font-size: 20px;
			font-family: 'Poppins', sans-serif;
			font-weight : bold;
			box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
		}
		.navtext{
			height: auto;
			width: 600px;

		}
		.logo{
			width : 100px;
			height : 50px;
			margin-left : 200px;
			margin-right : -200px;
		}
		
	</style>
</head>
<body>
	<nav class="navbar fixed-top">
		<a href="<?php echo site_url('Welcome/Home');?>"><img class="logo" src="<?php echo base_url('assets/images/logo03.png');?>"></a>
		<div class="navtext">
			<a href="<?php echo site_url('C_pemilik/list_lapangan/'.$id.'');?>" style="text-decoration: none; color: black; margin-right: 5%;"><span>List Lapangan</span></a>
			<a href="<?php echo site_url('Welcome/konfirmasi');?>" style="text-decoration: none; color: black; margin-right: 5%;"><span>Konfirmasi</span></a>
		</div>
		<div class="dropdown" style="margin-right: 14%;">
			<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<?php echo $sess['nama_pemilik']; ?>
			</button>
			<div class="dropdown-menu" style="margin-top : 10%;">
				<a class="dropdown-item" href="#">Riwayat Pemesanan</a>
				<a class="dropdown-item" href="#">Pengaturan</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="<?php echo site_url('C_pemilik/logout');?>"><span class="fa fa-sign-out">Keluar</span></a>
			</div>
		</div>
	</nav>
</body>
</html>