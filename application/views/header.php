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
		.dropdown-menu{
			width : 300px;
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
		<a href="<?php echo site_url('Welcome/Home');?>" id="logo"><span style="color : #49874B">#</span><span style="color : black;">futsal</span></a>
		<div class="navtext">
			<a href="<?php echo site_url('Welcome/CekBooking');?>" style="text-decoration: none; color: black; margin-right: 5%;"><span>Cek Booking</span></a>
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
						<input type="text" name="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="Email" required>
					</div>
					<div class="form-group">
						<label for="exampleDropdownFormPassword1">Password</label>
						<input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" required>
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
												<input type="name" class="form-control" name="nama" placeholder="Nama Lengkap" required>
											</div>
											<div class="col-md-12">
												<label for="email" class="control-label">Email</label>
												<input type="email" class="form-control" name="email" placeholder="Email" required>
											</div>
											<div class="col-md-12">
												<label for="password" class="control-label">Kata Sandi</label>
												<input type="password" class="form-control" name="password" placeholder="Kata Sandi" required>
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
												<input type="number" class="form-control" name="nohp" placeholder="No Handphone" required>
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