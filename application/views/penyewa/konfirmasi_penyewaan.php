<html>
	<head>
		<title>#Futsal | Konfirmasi</title>
		<script></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
			.isi{
				margin-top : 170px;
				margin-bottom : 250px;
			}
			.thead{
				background-color : #49874B;
			}
		</style>
	</head>
	<body>
		<?php 
			$sess = $this->session->userdata('loggin'); 
			$id = $sess['id_penyewa'];
			include "header_penyewa.php";
		?>
		<div class="isi">
			<h1 align="left">Data Pemesanan</h1>
			<table class="table table-striped table-bordered">
				<thead class="thead" align="center">
					<tr>
					  <th scope="col">No</th>
					  <th scope="col">Kode Bookig</th>
					  <th scope="col">Nama Lapangan</th>
					  <th scope="col">Tanggal Pemesanan</th>
					  <th scope="col">Jam</th>
					  <th scope="col">Durasi</th>
					  <th scope="col">Total Biaya</th>
					  <th scope="col">Status Pembayaran</th>
					  <th scope="col">Tanggal Pembayaran</th>
					  <th scope="col">Status Penyewaan</th>
					  <th scope="col">Action</th>
					</tr>
				</thead>
				<tbody align="center">
						<?php if($data_pemesanan == FALSE){?>
					<tr>
							<td colspan="10" align="center">
							- Anda Belum Pernah Memesan Lapangan -
							</td>
						<?php }else { $i=0; foreach($data_pemesanan as $dt_pem){ $i++;?>
							<td><?php echo $i; ?></td>
							<td><?php echo $dt_pem->kode; ?></td>
							<td><?php echo $dt_pem->nama_lapangan; ?></td>
							<td><?php echo $dt_pem->date; ?></td>
							<td><?php echo $dt_pem->jam; ?>:00</td>
							<td><?php echo $dt_pem->durasi; ?> Jam</td>
							<td>Rp.<?php echo $dt_pem->total_biaya; ?></td>
							<td><?php echo $dt_pem->status_pembayaran; ?></td>
							<?php if($dt_pem->date_pembayaran == '0000-00-00'){?>
								<td>-</td>
							<?php } else{?>
								<td><?php echo $dt_pem->date_pembayaran; ?></td>
							<?php }?>
							<td><?php echo $dt_pem->status_penyewaan; ?></td>
							<?php if($dt_pem->status_pembayaran == 'Belum Dibayar'){?>
							<td>
								<div class="row">
									<div class="col-6">
										<input type="button" class="btn btn-success" value="Konfirmasi" data-toggle="modal" data-target=".modalKonfirmasi<?php echo $dt_pem->id_pemesanan;?>">
									</div>
								
									<div class="col-6">
										<input type="button" class="btn btn-danger" value="Batal" data-toggle="modal" data-target=".modalBatal<?php echo $dt_pem->id_pemesanan;?>">
									</div>
								</div>	
							</td>
							<?php }else{?>
							<td>-</td>
							<?php }?>
							<!-- Modal Batal -->
							
							<!-- End Modal Batal-->
							<div class="modal modalBatal<?php echo $dt_pem->id_pemesanan;?>" tabindex="-1" role="dialog" >
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h3 class="modal-title">Pembatalan Pemesanan</h3>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>Apakah Anda Yakin Membatalkan Pemesanan?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<form method="post" action="<?php echo site_url('C_penyewa/batal_pemesanan')?>">
												<input type="hidden" value="<?php echo $dt_pem->id_pemesanan; ?>" name="id_pemesanan">
												<input type="hidden" value="<?php echo $dt_pem->id_penyewa; ?>" name="id_penyewa">
												<button type="submit" class="btn btn-success">Hapus Pemesanan</button>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- Modal Konfirmasi -->
							<div class="modal fade modalKonfirmasi<?php echo $dt_pem->id_pemesanan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body row">
										<?php echo form_open_multipart('C_penyewa/konfirmasi_booking');?>
											<div class="col-12">
												<label>Kode Booking</label>
												<input class="form-control" value="<?php echo $dt_pem->kode;?>" readonly>
											</div>
											<div class="col-12">
												<label>Nama Lapangan</label>
												<input class="form-control" value="<?php echo $dt_pem->nama_lapangan;?>" readonly>
											</div>
											<div class="col-12">
												<label>Total Biaya</label>
												<input class="form-control" value="Rp.<?php echo $dt_pem->total_biaya;?>" readonly>
											</div>
											<div class="col-md-12">
												<label class="control-label">Bukti Pembayaran</label>
												<input type="file" class="form-control" name="buktipem">
											</div>
											<input type="hidden" name="id_pemesanan" value="<?php echo $dt_pem->id_pemesanan; ?>">
											<input type="hidden" name="id_penyewa" value="<?php echo $dt_pem->id_penyewa; ?>">
											<input type="hidden" name="id_lapangan" value="<?php echo $dt_pem->id_lapangan; ?>">
											<input type="hidden" name="jml_dipesan" value="<?php echo $dt_pem->jumlah_dipesan; ?>">
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<input type="submit" class="btn btn-success" value="Konfirmasi Pembayaran">
										</div>
										</form>
								</div>
							  </div>
							</div>
							<!-- End Modal Konfirmasi -->
					</tr>
						<?php }} ?>
				</tbody>
			</table>
		</div>
		<?php
			include "footer_penyewa.php";
		?>

	</body>
</html>