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
			$id = $sess['id_pemilik'];
			include "header_pemilik.php";
		?>
		<div class="isi">
			<h1 align="left">Data Pemesanan</h1>
			<table class="table table-striped table-bordered">
				<thead class="thead" align="center">
					<tr>
					  <th scope="col">No</th>
					  <th scope="col">Kode Bookig</th>
					  <th scope="col">Tanggal Pemesanan</th>
					  <th scope="col">Jam</th>
					  <th scope="col">Durasi</th>
					  <th scope="col">Total Biaya</th>
					  <th scope="col">Status Pembayaran</th>
					  <th scope="col">Tanggal Pembayaran</th>
					  <th scope="col">Status Penyewaan</th>
					  <th scope="col">Bukti Pembayaran</th>
					  <th scope="col">Action</th>
					</tr>
				</thead>
				<tbody align="center">
						<?php if($data_pemesanan == FALSE){?>
					<tr>
							<td colspan="10" align="center">
							- Belum Ada Penyewa Yang Menyewa Lapangan Anda -
							</td>
						<?php }else { $i=0; foreach($data_pemesanan as $dt_pem){ $i++;?>
							<td><?php echo $i; ?></td>
							<td><?php echo $dt_pem->kode; ?></td>
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
							<td>
								<?php if($dt_pem->bukti_pembayaran != NULL){?>
								<img src="<?php echo base_url('assets/images/bukti_pembayaran/'.$dt_pem->bukti_pembayaran.'');?>" style="width : 100px; max-height : 100%">
								<?php }else{?>
								-
								<?php }?>
							</td>
							<?php if($dt_pem->status_pembayaran == 'Menunggu Konfirmasi Pemilik'){?>
							<td>
								<div class="row container">
									<div class="col-6">
										<form method="POST" action="<?php echo site_url('C_pemilik/konfirmasi_pemilik')?>">
											<input type="hidden" name="id_pemesanan" value="<?php echo $dt_pem->id_pemesanan;?>">
											<input type="hidden" name="id_pemilik" value="<?php echo $dt_pem->id_pemilik;?>">
											<input type="submit" class="btn btn-success" value="Konfirmasi" data-toggle="modal" data-target=".modalKonfirmasi<?php echo $dt_pem->id_pemesanan;?>">
										</form>
									</div>
								</div>	
							</td>
							<?php }elseif($dt_pem->status_pembayaran == 'Belum Dibayar'){?>
							<td>
								<div class="row container">
									<div class="col-6">
										<input type="button" class="btn btn-danger disabled" value="Pending" data-toggle="modal" data-target=".modalKonfirmasi<?php echo $dt_pem->id_pemesanan;?>">
									</div>
								</div>
							</td>
							<?php }elseif($dt_pem->status_pembayaran == 'Telah Dikonfirmasi' && $dt_pem->status_penyewaan == 'Belum Selesai'){?>
							<td>
								<div class="row container">
									<div class="col-6">
										<form method="POST" action="<?php echo site_url('C_pemilik/penyewaan_selasai')?>">
											<input type="hidden" name="id_pemesanan" value="<?php echo $dt_pem->id_pemesanan;?>">
											<input type="hidden" name="id_pemilik" value="<?php echo $dt_pem->id_pemilik;?>">
											<input type="submit" class="btn btn-success" value="Selesai" data-toggle="modal" data-target=".modalKonfirmasi<?php echo $dt_pem->id_pemesanan;?>">
										</form>
									</div>
								</div>	
							</td>	
							<?php }else{?>
							<td>
							-
							</td>
							<?php }?>
					</tr>
						<?php }} ?>
				</tbody>
			</table>
		</div>
		<?php
			include "footer_pemilik.php";
		?>

	</body>
</html>