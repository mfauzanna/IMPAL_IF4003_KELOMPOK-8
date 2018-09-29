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
		.dropdown-menu{
			width : 300px;
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
			<a href="<?php echo site_url('Welcome/CekBooking');?>" style="text-decoration: none; color: black; margin-right: 5%;"><span>Cek Booking</span></a>
			<a href="<?php echo site_url('Welcome/konfirmasi');?>" style="text-decoration: none; color: black; margin-right: 5%;"><span>Konfirmasi</span></a>
			<a style="text-decoration : none; color : black;" href="" data-toggle="modal" data-target=".bd-example-modal-lg"><span>Daftar</span></a>
		</div>
		<div class="dropdown" style="margin-right: 14%;">
			<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Login
			</button>
			<div class="dropdown-menu">
			    <form class="px-4 py-3" method="POST" action="<?php echo site_url('Welcome/cek_login');?>">
					<div class="form-group">
						<label for="exampleDropdownFormEmail1">Email</label>
						<input type="text" name="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="exampleDropdownFormPassword1">Password</label>
						<input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-secondary btn-block">Sign in</button>
				</form>
			</div>
		</div>
	</nav>
	<div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title" align="center"><strong>Mari Gabung Menjadi Member LetsFutsal</h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</div>
							<div class="modal-body">
								<form method="POST" action="<?php echo site_url('Welcome/register_penyewa'); ?>">
									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<label for="nama" class="control-label">Nama</label>
												<input type="name" class="form-control" name="nama" placeholder="Nama Lengkap">
											</div>
											<div class="col-md-12">
												<label for="email" class="control-label">Email</label>
												<input type="email" class="form-control" name="email" placeholder="Email">
											</div>
											<div class="col-md-12">
												<label for="password" class="control-label">Kata Sandi</label>
												<input type="password" class="form-control" name="password" placeholder="Kata Sandi">
											</div>
											<div class="col-md-12">
												<label for="kelamin" class="control-label">Kelamin</label>
												<select name="kelamin" class="form-control">
													<option value="-">- Kelamin -</option>
													<option value="Pria">Pria</option>
													<option value="Wanita">Wanita</option>
												</select>
											</div>
											<div class="col-md-12">
												<label class="control-label">Alamat</label>
												<textarea class="form-control" placeholder="Alamat" name="alamat"></textarea>
											</div>
											<div class="col-md-12">
												<label for="nama" class="control-label">No Handphone</label>
												<input type="number" class="form-control" name="nohp" placeholder="No Handphone">
											</div>
											<div class="col-md-12 text-center">
												<br>
												<br>
												<button type="submit" class="btn btn-success" name="submit2">Submit</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
				    </div>
				</div>
</body>
</html>