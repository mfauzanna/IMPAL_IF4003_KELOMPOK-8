<html>
	<head>
		<title>Lets Futsal</title>
		<script></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
			.img-1 {
				margin-top : 65px;
			}
			.cari{
				margin-top : 5%;
			}
			.button {
				background-color: #4CAF50; /* Green */
				border: 6px solid #fff;
				border-radius : 100px;
				color: white;
				padding: 15px 32px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin: 4px 2px;
				cursor: pointer;
				-webkit-transition-duration: 0.4s; /* Safari */
				transition-duration: 0.4s;
				
			}
			.button2:hover {
				box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
			}
			.a2{
				
			}
			.tx1{
				text-align : center;
				font-weight : bold;
				font-size : 25px;
			}
			.tx2{
				text-align : center;
				font-style : italic;
			}

		</style>
	</head>
	<body>
		<?php 
			$sess = $this->session->userdata('loggin'); 
			$id = $sess['id_penyewa'];
			include "header_penyewa.php";
		?>
		<div>
			<div class="img-1" style="max-width:1600px">
				<img src="<?php echo base_url('assets/images/bg3.jpg');?>" style="width:100%">
			</div>
			<div class="container cari">
				<form method="POST" action>
					<div class="card">
						<h1 style="text-align : center; margin-top: 2%;">Cari Lapangan</h1>
						<div class="container">
							<div class="row">
								<div class="col-3">
									Lokasi
								</div>
								<div class="col-3">
									Tanggal
								</div>
								<div class="col-2">
									Jam
								</div>
								<div class="col-2">
									Durasi
								</div>
								<div class="col-2">
								</div>
							</div>
						</div>
						<div class="container" style="padding-bottom : 50px;">
							<div class="row">
								<div class="col-3">
									<select class="form-control">
										<option value="">Bandung</option>
									</select>
								</div>
								<div class="col-3">
									<input class="form-control" type="date">
								</div>
								<div class="col-2">
									<input class="form-control" type="time">
								</div>
								<div class="col-2">
									<select class="form-control">
										<option value="">1 Jam</option>
										<option value="">2 Jam</option>
										<option value="">3 Jam</option>
										<option value="">4 Jam</option>
									</select>
								</div>
								<div class="col-2">
									<input type="button" class="btn btn-success btn-block" value="Cari">
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div>
				<h2 style="text-align : center">Daftar Lapangan Tersedia</h2>
				<?php if($data_lp == true){?>
				<div class="row">
				<?php foreach($data_lp as $dt){?>
						<div class="a2 col-4">
							<div class="card-header">
								<img style="width : 100%; height : 250px;" src="<?php echo base_url('assets/images/lapangan/'.$dt->foto_lp1.'');?>">
							</div>
							<div class="card">
							<p class="tx1"><?php echo $dt->nama_lapangan;?></p>
							<p class="tx1"><?php echo $dt->jenis_lapangan;?></p>
							<p class="tx2"><?php echo $dt->alamat_lapangan;?></p>
							<a href="<?php echo site_url('C_penyewa/pesan/'.$dt->id_lapangan.''); ?>" class="btn btn-success">Pesan <?php echo $dt->id_lapangan;?></a>
							</div>
						</div>
				<?php }?>
				</div>
				<?php } ?>
			<div>
			<div align="center" style="margin-top : 100px;">
					<div class="col-9">
						<a href="<?php echo site_url('Welcome/daftarpemilik');?>" class="button button2" style="text-decoration:none;">Gabung Menjadi Partner LetsFutsal</a>
					</div>
			</div>
		</div>
		<?php
			include "footer_penyewa.php";
		?>	
	</body>
</html>