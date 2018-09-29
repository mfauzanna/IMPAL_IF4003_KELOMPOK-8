<html>
	<head>
		<title>Lets Futsal | Daftar Pemilik</title>
		<script></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
			.bg{
				margin-top : 170px;
				margin-bottom : 100px;
			}
			.isi{
				margin-top : 20px;
				margin-bottom : 40px;
			}
		</style>
	</head>
	<body>
		<?php 
			include "header.php";
		?>
		<div class="bg col-7 container">
			<form method="POST" action="<?php echo site_url('Welcome/register_pemilik');?>">
				<div class="card-header" align="center">
					<h2>Daftar Sebagai Pemilik Lapangan</h2>
				</div>
				<div class="container card-body">						
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
							<label for="nama" class="control-label">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password">
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
							<input type="submit" value="Submit" class="btn btn-success" name="submit2">
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php
			include "footer.php";
		?>

	</body>
</html>