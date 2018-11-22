<html>
	<head>
		<title>#Futsal | Cek Booking</title>
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
			$sess = $this->session->userdata('loggin'); 
			$id = $sess['id_penyewa'];
			include "header_penyewa.php";
		?>
		<form method="POST" action="<?php echo site_url('C_penyewa/cek_booking_user');?>">
			<div class="text-center bg container col-5">
				<div class="card-header">
					<h2>Cek Kode Booking</h2>
				</div>
				<div class="card-body">
					<div class="col-12 isi container">
						<p align="center" >Kode Booking</p>
						<input name="kode" type="text" class="form-control" style="text-align:center;" required>
						<br>
					</div>
				</div>
				<div class="card-footer">
					<input type="submit" class="btn btn-success" value="Cek Kode">
				</div>
			</div>
		</form>
		<?php
			include "footer_penyewa.php";
		?>

	</body>
</html>