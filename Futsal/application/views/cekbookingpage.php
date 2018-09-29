<html>
	<head>
		<title>Lets Futsal | Cek Booking</title>
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
		<form>
			<div class="text-center bg container col-5">
				<div class="card-header">
					<h2>Cek Konfirmasi</h2>
				</div>
				<div class="card-body">
					<div class="col-7 isi container">
						<p>Kode Booking</p>
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="card-footer text-muted">
					<input type="button" class="btn btn-success" value="Cek Kode Booking">
				</div>
			</div>
		</form>
		<?php
			include "footer.php";
		?>

	</body>
</html>