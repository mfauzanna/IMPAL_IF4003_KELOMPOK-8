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
				font-size : 15px;
			}
			.prgtn{
				font-size : 10px;
				color : red;
				font-style : italic;
			}
		</style>
	</head>
	<body>
		<?php 
			include "header.php";
		?>
		<div class="text-center bg container col-5">
			<div class="card-header">
				<h2>Cek Kode Booking</h2>
			</div>
			<div class="card-body">
				<div class="col-12 isi">
					<?php foreach($data_booking as $dt){?>
						<div class="row">
							<div class="col-4" align="right">
							Kode Booking
							</div>
							
							<div class="col-2">
							:
							</div>
							
							<div class="col-6" align="left">
							<?php echo $dt->kode;?>
							</div>
						</div>
						
						<div class="row">
							<div class="col-4" align="right">
							Nama Lapangan
							</div>
							
							<div class="col-2">
							:
							</div>
							
							<div class="col-6" align="left">
							<?php echo $dt->nama_lapangan;?>
							</div>
						</div>
						
						<div class="row">
							<div class="col-4" align="right">
							Nama Penyewa
							</div>
							
							<div class="col-2">
							:
							</div>
							
							<div class="col-6" align="left">
							<?php echo $dt->nama_penyewa;?>
							</div>
						</div>
						
						<div class="row">
							<div class="col-4" align="right">
							Alamat Lapangan
							</div>
							
							<div class="col-2">
							:
							</div>
							
							<div class="col-6" align="left">
							<?php echo $dt->alamat_lapangan;?>
							</div>
						</div>
						
						<div class="row">
							<div class="col-4" align="right">
							Total Biaya
							</div>
							
							<div class="col-2">
							:
							</div>
							
							<div class="col-6" align="left">
							Rp.<?php echo $dt->total_biaya;?>
							</div>
						</div>
						<div class="row">
							<div class="col-4" align="right">
							Status Pembayaran
							</div>
							
							<div class="col-2">
							:
							</div>
							
							<div class="col-6" align="left">
							<?php echo $dt->status_pembayaran;?>
							</div>
						</div>
					<?php } ?>
					<br>
					<p align="right" class="prgtn">*anda harus login untuk melakukan pembayaran</p>
				</div>
			</div>
			<div class="card-footer">
				<form action="<?php echo site_url('Welcome/CekBooking');?>">
					<input type="submit" class="btn btn-success" value="Kembali">
				</form>
			</div>
		</div>
		<?php
			include "footer.php";
		?>

	</body>
</html>