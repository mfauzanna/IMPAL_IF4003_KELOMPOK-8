<html>
	<head>
		<title>Lets Futsal</title>
		<script></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
		.tp{
			margin-top : 150px;
		}
		</style>
	</head>
	<body>
		<?php 
			$sess = $this->session->userdata('loggin'); 
			$id = $sess['id_penyewa'];
			include "header_penyewa.php";
		?>
		<div class="row tp">
			<div class="col-2">
			</div>
			<div class="card-body col-8">
			
				<h3 align="center">Data Lapangan</h3>
		
				<div class="row">
					<?php foreach($data_lp as $dt){?>
					<div class="col-6">
						<img src="<?php echo base_url('assets/images/lapangan/'.$dt->foto_lp1.'');?>" style="width : 100%; height : 400px;">
					</div>
					<div class="col-6">
							<p>Nama Lapangan : <?php echo $dt->nama_lapangan; ?></p>
							<p>Alamat : asdasd <?php echo $dt->alamat_lapangan; ?></P>
							<p>Jenis Lapangan : <?php echo $dt->jenis_lapangan; ?></p>
							<p>Deskripsi Lapangan : <?php echo $dt->deskripsi; ?></p>
					</div>
					<?php }?>
				</div>
				<div class="card-footer" align="center">
					<button class="btn btn-success">Pesan</button>
				</div>
			</div>
			<div class="col-2">
			</div>
		</div>
		<?php
			include "footer_penyewa.php";
		?>	
	</body>
</html>