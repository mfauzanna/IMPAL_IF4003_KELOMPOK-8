<html>
	<head>
		<title>#Futsal | Home</title>
		<script></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
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
			
		</style>
	</head>
	<body>
		<?php 
			$sess = $this->session->userdata('loggin'); 
			$id = $sess['id_penyewa'];
			$total_memesan = $sess['total_memesan'];
			include "header_penyewa.php";
		?>
		<div>
			<!-- Form Cari Lapangan-->
			<div class="img-1" style="max-width: 100%px;">
				<img src="<?php echo base_url('assets/images/action-ball-field-274506.jpg');?>" style="width:100%; height : 400px;">
				<div class="centered">
					<p style="font-size : 20px">Cari Lapangan Futsal?</p>
					<p style="font-size : 40px; font-weight : bold;">Cek di <span style="color : #49874B;">#</span>Futsal aja.</p>
					<form method="post" action="<?php echo site_url('C_penyewa/cari_tipe_lapangan_penyewa');?>">
					<input class="ip ip4" value="Bandung" readonly>
					<select class="ip ip2" name="tipe_pencarian" required>
						<option disabled value="" selected>Tipe Lapangan</option>
						<option value="Lapangan Matras">Lapangan Matras</option>
						<option value="Lapangan Rumput">Lapangan Rumput</option>
					</select>
					
					<input type="submit" value="Cari Sekarang" class="ip ip3">
					</form>
				</div>
			</div>
			<!-- End Form Cari Lapangan-->
			
			<!-- Lapangan Hasil Pencarian-->
			<div class="rekom" style="margin-top : 100px;">
				<div class="">
					<div class="row">
					<?php foreach($data_lapangan as $dt){?> 
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
							<div class="row container">
								<div class="col-6">
									<button type="button" class="btn btn-outline-success bnn bnn1" data-toggle="modal" data-target="#detail_favorit<?php echo $dt->id_lapangan;?>">
										Detail Lapangan
									</button>
								</div>
								<div class="col-6">
									<button type="button" class="btn bnn bnn2" data-toggle="modal" data-target="#pesan_favorit<?php echo $dt->id_lapangan;?>">
										Pesan Lapangan
									</button>
								</div>
							</div>
						</div>
						<!-- Modal Detail Lapangan Hasil Pencarian-->
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
										</div>
										<div class="col-5">
											<div class="form-group">
												<label for="nama_l">Nama Lapangan</label>
												<input id="nama_l"readonly class="form-control" value="<?php echo $dt->nama_lapangan;?>">
											</div>	
											<div class="form-group">
												<label for="jenis_l">Jenis Lapangan</label>
												<input id="jenis_l"readonly class="form-control" value="<?php echo $dt->jenis_lapangan;?>">
											</div>	
											<div class="form-group">
												<label for="deskrip_l">Deskripsi Lapangan</label>
												<textarea id="deskrip_l"readonly class="form-control" ><?php echo $dt->deskripsi;?></textarea>
											</div>
											<div class="form-group">
												<label for="alamat_l">Alamat Lapangan</label>
												<textarea id="alamat_l"readonly class="form-control" ><?php echo $dt->alamat_lapangan;?></textarea>
											</div>
											<div class="form-group">
												<label for="harga_l">Harga Sewa Lapangan</label>
												<input id="harga_l" readonly class="form-control" value="Rp.<?php echo $dt->harga;?>/Jam">
											</div>
											<div class="form-group">
												<label for="no_hpL">No Handphone</label>
												<input id="no_hpL" readonly class="form-control" value="<?php echo $dt->nohp_pemilik;?>">
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
						<!-- End Modal Detail Lapangan Hasil Pencarian-->
						
						<!-- Modal Pesan Lapangan Hasil Pencarian-->
						<div class="modal fade" id="pesan_favorit<?php echo $dt->id_lapangan;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Pemesanan Lapangan</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<label for="nama_l">Nama Lapangan</label>
												<input id="nama_l"readonly class="form-control" value="<?php echo $dt->nama_lapangan;?>">
											</div>
											<form method="post" action="<?php echo site_url('C_penyewa/pemesanan');?>">
											<div class="form-group">
												<label for="tanggal_p">Tanggal Pemesanan</label>
												<input id="tanggal_p" class="form-control" type="date" name="tanggal_pemesanan" required>
											</div>
											<div class="form-group">
												<label for="jam">Jam Pemesanan</label>
												<select class="form-control" id="jam" name="jam_pemesanan" required>
													<option disabled selected>Jam Booking</option>
													<option value="9">9:00</option>
													<option value="10">10:00</option>
													<option value="11">11:00</option>
													<option value="12">12:00</option>
													<option value="13">13:00</option>
													<option value="14">14:00</option>
													<option value="15">15:00</option>
													<option value="16">16:00</option>
													<option value="17">17:00</option>
													<option value="18">18:00</option>
													<option value="19">19:00</option>
													<option value="20">20:00</option>
													<option value="21">21:00</option>
													<option value="11">22:00</option>
												</select>
											</div>
											<div class="form-group">
												<label for="durasi_p">Durasi</label>
												<select class="form-control" id="durasi_p" name="durasi_pemesanan" required>
													<option disabled selected>Durasi Booking</option>
													<option value="1">1 Jam</option>
													<option value="2">2 Jam</option>
													<option value="3">3 Jam</option>
												</select>
											</div>
											<input type="hidden" name="id_penyewa" value="<?php echo $id;?>">
											<input type="hidden" name="total_memesan" value="<?php echo $total_memesan;?>">
											<input type="hidden" name="id_lapangan" value="<?php echo $dt->id_lapangan;?>">
											<input type="hidden" name="biaya" value="<?php echo $dt->harga;?>">
											<input type="hidden" name="status" value="<?php echo $sess['status_menyewa'];?>">
											<input type="hidden" name="email" value="<?php echo $sess['email_penyewa'];?>">
										</div>
										<div class="modal-footer">
											<input type="submit" class="btn btn-outline-success" value="Pesan Lapangan">
										</div>
										</form>
								</div>
							</div>
						</div>
						<!-- End Modal Pesan Lapangan Hasil Pencarian-->
					<?php }?>
					</div>
				</div>
			</div>
			<!-- End Lapangan Hasil Pencarian-->
		</div>
		<?php
			include "footer_penyewa.php";
		?>	
	</body>
</html>