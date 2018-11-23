<html>
	<head>
		<title>#Futsal</title>
		<script></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
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
				color : white;
			}
			
			.img-1 {
				margin-top : 10px;
				position: relative;
				text-align: left;
			}
			.cari{
				margin-top : 5%;
			}
			.centered {
				position: absolute;
				top: 50%;
				left: 50%;
				margin-top : -3%;
				transform: translate(-50%, -50%);
				color : white;
				width : 1200px;
			}
			.ip{
				height : 50px;
				text-align : center;
				text-align-last : center;
				width : 190px;
				color : black;
				border-style : none;
			}
			.ip2{
				margin-left : -2px;
			}
			.ip3{
				background-color : #11a32f;
				color : white;
				width : 150px;
				border-radius : 0px 10px 10px 0px;
			}
			.ip4{
				border-radius : 10px 0px 0px 10px;
			}
			.rekom{
				margin-left : 5%;
			}
			.tx2{
				padding : 8px 0 8px 0;
			}
			.tx3{
				margin : 4% 0 0 5%;
			}
			.bnn1{
				background-color : white;
				color : #4a874b;
				border : 1px solid  #4a874b;
			}
			.bnn2{
				background-color : #4a874b;
				color : white;
			}
			.tx1{
				padding-right : 100px;
			}
			.rw1{
				box-shadow: 1px 2px 5px 2px #888888;
				padding-bottom : 10px;
			}
			.text_peringatan{
				font-style : italic;
				font-size : 10px;
			}
		</style>
	</head>
	<body>
		<?php 
			include "header.php";
		?>
		<div>
			<!-- Form Cari Lapangan-->
			<div class="img-1" style="max-width: 100%px;">
				<img src="<?php echo base_url('assets/images/action-ball-field-274506.jpg');?>" style="width:100%; height : 400px;">
				<div class="centered">
					<p style="font-size : 20px">Cari Lapangan Futsal?</p>
					<p style="font-size : 40px; font-weight : bold;">Cek di <span style="color : #49874B;">#</span>Futsal aja.</p>
					<form method="post" action="<?php?>">
					<input class="ip ip4" value="Bandung" readonly>
					<select class="ip ip2" name="tipe_pencarian">
						<option disabled selected>Tipe Lapangan</option>
						<option value="">Lapangan Rumput Sintetis</option>
						<option value="">Lapangan Vinyl</option>
					</select>
					
					<input type="submit" value="Cari Sekarang" class="ip ip3">
					</form>
				</div>
			</div>
			<!-- End Form Cari Lapangan-->
			
			<!-- Lapangan Rekomendasi-->
			<div class="rekom">
				<br>
				<br>
				<p class="rk1">Rekomendasi Tempat Futsal di <span style="color : #49874B;">#</span><span style="font-size : 18px;">Bandung</span></p>
				<div class="">
					<div class="row">
					<?php foreach($data_lp_rekom as $dt_rekom){?> 
						<div class="col-3 rw1" style="margin : 2% 7% 2% 0;">
							<img style="width : 100%; height : 250px;" src="<?php echo base_url('assets/images/lapangan/'.$dt_rekom->foto_lp1.'');?>">
							<div class="row" style="text-align : center;">
								<div class="col-6 tx2 tx1" style="background-color : #49874B; color : white;">
									<?php echo $dt_rekom->jenis_lapangan;?>
								</div>
								<div class="col-6 tx2" style="color : #49874B; border : 1px solid #49874B;">
								Rp.<?php echo $dt_rekom->harga;?>/Jam
								</div>
							</div>
							<div class="tx3">
								<p style="color : #49874B; "><?php echo $dt_rekom->nama_lapangan;?></p>
								<p style="font-weight : bold;"><?php echo $dt_rekom->alamat_lapangan;?></p>
							</div>
							<div class="col-6 container">
								<button type="button" class="btn btn-outline-success bnn bnn1" data-toggle="modal" data-target="#detail_rekom<?php echo $dt_rekom->id_lapangan;?>">
									Detail Lapangan
								</button>
							</div>
						</div>
						
						<!-- Modal Detail Lapangan Rekomendasi -->
						<div class="modal fade" id="detail_rekom<?php echo $dt_rekom->id_lapangan;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Detail Lapangan</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								  </div>
								  <div class="modal-body">
									<div class="row">
										<div class="col-7">
											<br>
											<br>
											<br>
											<img src="<?php echo base_url('assets/images/lapangan/'.$dt_rekom->foto_lp1.''); ?>" style="max-width : 100%; height : 400px;">
											<p class="text_peringatan">Anda Harus Login Untuk Memesan Lapangan</p>
										</div>
										<div class="col-5">
											<div class="form-group">
												<label for="nama_l">Nama Lapangan</label>
												<input readonly class="form-control" value="<?php echo $dt_rekom->nama_lapangan;?>">
											</div>	
											<div class="form-group">
												<label for="jenis_l">Jenis Lapangan</label>
												<input readonly class="form-control" value="<?php echo $dt_rekom->jenis_lapangan;?>">
											</div>	
											<div class="form-group">
												<label for="deskrip_l">Deskripsi Lapangan</label>
												<textarea readonly class="form-control" ><?php echo $dt_rekom->deskripsi;?></textarea>
											</div>
											<div class="form-group">
												<label for="alamat_l">Alamat Lapangan</label>
												<textarea readonly class="form-control" ><?php echo $dt_rekom->alamat_lapangan;?></textarea>
											</div>
											<div class="form-group">
												<label for="harga_l">Harga Sewa Lapangan</label>
												<input readonly class="form-control" value="Rp.<?php echo $dt_rekom->harga;?>/Jam">
											</div>
											<div class="form-group">
												<label for="no_hpL">No Handphone</label>
												<input readonly class="form-control" value="<?php echo $dt_rekom->nohp_pemilik;?>">
											</div>
										</div>
									</div>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								  </div>
								</div>
							</div>
						</div>
						<!-- End Modal Detail Lapangan Rekomendasi-->
						
					<?php }?>
					</div>
				</div>
			</div>
			<!-- End Lapangan Rekomendasi-->
			
			<!-- Lapangan Favorit-->
			<div class="rekom" style="margin-top : 100px;">
				<p class="rk1">Tempat Futsal Favorit di <span style="color : #49874B;">#</span><span style="font-size : 18px;">Futsal</span></p>
				<div class="">
					<div class="row">
					<?php foreach($data_lp as $dt){?> 
						<div class="col-3 rw1" style="margin : 2% 7% 2% 0;">
							<img style="width : 100%; height : 250px;" src="<?php echo base_url('assets/images/lapangan/'.$dt->foto_lp1.'');?>">
							<div class="row" style="text-align : center;">
								<div class="col-6 tx2 tx1" style="background-color : #49874B; color : white;">
								<?php echo $dt->jenis_lapangan;?>
								</div>
								<div class="col-6 tx2" style="color : #49874B; border : 1px solid #49874B;">
								Rp.<?php echo $dt->harga;?>/Jam
								</div>
							</div>
							<div class="tx3">
								<p style="color : #49874B; "><?php echo $dt->nama_lapangan;?></p>
								<p style="font-weight : bold;"><?php echo $dt->alamat_lapangan;?></p>
							</div>
							<div class="col-6 container">
								<button type="button" class="btn btn-outline-success bnn bnn1" data-toggle="modal" data-target="#detail_favorit<?php echo $dt_rekom->id_lapangan;?>">
									Detail Lapangan
								</button>
							</div>
						</div>
						<!-- Modal Detail Lapangan Favorit-->
						<div class="modal fade" id="detail_favorit<?php echo $dt->id_lapangan;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Detail Lapangan</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								  </div>
								  <div class="modal-body">
									<div class="row">
										<div class="col-7">
											<br>
											<br>
											<br>
											<img src="<?php echo base_url('assets/images/lapangan/'.$dt->foto_lp1.''); ?>" style="max-width : 100%; height : 400px;">
											<p class="text_peringatan">Anda Harus Login Untuk Memesan Lapangan</p>
										</div>
										<div class="col-5">
											<div class="form-group">
												<label for="nama_l">Nama Lapangan</label>
												<input readonly class="form-control" value="<?php echo $dt->nama_lapangan;?>">
											</div>	
											<div class="form-group">
												<label for="jenis_l">Jenis Lapangan</label>
												<input readonly class="form-control" value="<?php echo $dt->jenis_lapangan;?>">
											</div>	
											<div class="form-group">
												<label for="deskrip_l">Deskripsi Lapangan</label>
												<textarea readonly class="form-control" ><?php echo $dt->deskripsi;?></textarea>
											</div>
											<div class="form-group">
												<label for="alamat_l">Alamat Lapangan</label>
												<textarea readonly class="form-control" ><?php echo $dt->alamat_lapangan;?></textarea>
											</div>
											<div class="form-group">
												<label for="harga_l">Harga Sewa Lapangan</label>
												<input readonly class="form-control" value="Rp.<?php echo $dt->harga;?>/Jam">
											</div>
											<div class="form-group">
												<label for="no_hpL">No Handphone</label>
												<input readonly class="form-control" value="<?php echo $dt->nohp_pemilik;?>">
											</div>
										</div>
									</div>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								  </div>
								</div>
							</div>
						</div>
						<!-- End Modal Detail Lapangan Favorit-->
						
					<?php }?>
					</div>
				</div>
			</div>
			<!-- End Lapangan Favorit-->
		</div>
			<div align="center" style="margin-top : 100px;">
					<div class="col-9">
						<a href="<?php echo site_url('Welcome/daftarpemilik');?>" class="button button2" style="text-decoration:none;">Gabung Menjadi Partner LetsFutsal</a>
					</div>
			</div>
		<?php
			include "footer.php";
		?>	
	</body>
</html>