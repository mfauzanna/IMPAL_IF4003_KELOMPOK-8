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
				margin-top : 50%;
				margin-bottom : 50%;
				cursor: pointer;
				-webkit-transition-duration: 0.4s; /* Safari */
				transition-duration: 0.4s;
				
			}
			.button2:hover {
				color : #49874B;
				border: 4px solid #49874B;
				font-size : 30px;
				font-weight : bold;
				background-color : white;
			}
			.a2{
				margin-right : 10px;
				border-radius-top : 100px;
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
	<body style="font-family: 'Poppins', sans-serif;">
		<?php 
			$sess = $this->session->userdata('loggin'); 
			$id = $sess['id_pemilik'];
			include "header_pemilik.php";
		?>
		<div>
			<div class="img-1" style="max-width: 100%px;">
				<img src="<?php echo base_url('assets/images/action-ball-field-274506.jpg');?>" style="width:100%; height : 400px;">
				
			</div>
			<div class="container cari">
				<div class="card-header">
					<nav class="container">
						<h1 style="text-align : center; margin-top: 2%;">List Lapangan Anda</h1>
					    <div class="nav nav-tabs" id="nav-tab" role="tablist">
						    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Lapangan Rumput</a>
						    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Lapangan Matras</a>
						</div>
					</nav>
				</div>
				<div class="card-body">
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							<div class="row" style="margin-top : 50px;">
							<?php if($data_lp == TRUE){ 
							foreach ($data_lp as $dt){
								if($dt->jenis_lapangan == 'Lapangan Rumput'){
								?>
								<div class="a2 col-4">
									<div class="card-header">
										<img style="width : 100%; height : 250px;" src="<?php echo base_url('assets/images/lapangan/'.$dt->foto_lp1.'');?>">
									</div>
									<div class="card">
									<p class="tx1"><?php echo $dt->nama_lapangan;?></p>
									<p class="tx2"><?php echo $dt->alamat_lapangan;?></p>
									<button type="button" class="btn btn-success" data-toggle="modal" data-target=".modallp<?php echo $dt->id_lapangan;?>">
									Lihat
									</button>
									</div>
								</div>
								<div class="modal fade bd-example-modal-lg modallp<?php echo $dt->id_lapangan;?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								    <div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
									    <div class="modal-header">
											<h5 style="text-align : center">Pengaturan Lapangan</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
										<form method="POST" action="<?php echo site_url('C_pemilik/update_lapangan');?>">
											<div class="row">
													<div class="col-6">
														<img style="width : 100%; height : 250px;" src="<?php echo base_url('assets/images/lapangan/'.$dt->foto_lp1.'');?>">
													</div>
													<input type="hidden" class="form-control" name="id" value="<?php echo $dt->id_lapangan;?>">
													<input type="hidden" class="form-control" name="id_pemilik" value="<?php echo $id;?>">
													<div class="col-6">
														<div class="col-md-12">
															<label for="nama" class="control-label">Nama Lapangan</label>
															<input type="text" class="form-control" name="nama" value="<?php echo $dt->nama_lapangan;?>">
														</div>
														<div class="col-md-12">
															<label for="alamat" class="control-label">Alamat</label>
															<input type="text" class="form-control" name="alamat" value="<?php echo $dt->alamat_lapangan;?>">
														</div>
														<div class="col-md-12">
															<label for="jenis" class="control-label">Jenis Lapangan</label>
															<select class="form-control" name="jenis">
																<option value="<?php echo $dt->jenis_lapangan;?>"><?php echo $dt->jenis_lapangan;?></option>
																<option value="lapangan matras">lapangan matras</option>
															</select>
														</div>
														<div class="col-md-12">
															<label for="deskripsi" class="control-label">Deskripsi</label>
															<textarea class="form-control" name="deskripsi"><?php echo $dt->deskripsi;?></textarea>
														</div>
													</div>
											</div>
										</div>
										<div class="modal-footer">
													<button type="submit" class="btn btn-success" >Edit</button>
												</form>
										<form method="POST" action="<?php echo site_url('C_pemilik/hapus_lapangan');?>"> 
										<button type="submit" class="btn btn-danger">Hapus</button>
											<input type="hidden" name="id" value="<?php echo $dt->id_lapangan;?>">
											<input type="hidden" class="form-control" name="id_pemilik" value="<?php echo $dt->id_lapangan;?>">
										</form>
									  </div>
									</div>
								  </div>
								</div>
								<?php }}} ?>
								<div class="col-3">
									<div align="center">
										<a href="<?php echo site_url('C_pemilik/tambah_lapangan');?>" class="button button2" style="text-decoration : none;">+</a>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							<div class="row" style="margin-top : 50px;">
							<?php if($data_lp == TRUE){
							foreach ($data_lp as $dt){
								if($dt->jenis_lapangan == 'Lapangan Matras'){
								?>
								<div class="a2 col-4">
									<div class="card-header">
										<img style="width : 100%; height : 250px;" src="<?php echo base_url('assets/images/lapangan/'.$dt->foto_lp1.'');?>">
									</div>
									<div class="card">
									<p class="tx1"><?php echo $dt->nama_lapangan;?></p>
									<p class="tx2"><?php echo $dt->alamat_lapangan;?></p>
									<button type="button" class="btn btn-success" data-toggle="modal" data-target=".modallp<?php echo $dt->id_lapangan;?>">
									Lihat
									</button>
									</div>
								</div>
								<div class="modal fade bd-example-modal-lg modallp<?php echo $dt->id_lapangan;?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								    <div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
									    <div class="modal-header">
											<h5 style="text-align : center">Pengaturan Lapangan</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
										<form method="POST" action="<?php echo site_url('C_pemilik/update_lapangan');?>">
											<div class="row">
													<div class="col-6">
														<img style="width : 100%; height : 250px;" src="<?php echo base_url('assets/images/lapangan/'.$dt->foto_lp1.'');?>">
													</div>
													<input type="hidden" class="form-control" name="id" value="<?php echo $dt->id_lapangan;?>">
													<input type="hidden" class="form-control" name="id_pemilik" value="<?php echo $id;?>">
													<div class="col-6">
														<div class="col-md-12">
															<label for="nama" class="control-label">Nama Lapangan</label>
															<input type="text" class="form-control" name="nama" value="<?php echo $dt->nama_lapangan;?>">
														</div>
														<div class="col-md-12">
															<label for="alamat" class="control-label">Alamat</label>
															<input type="text" class="form-control" name="alamat" value="<?php echo $dt->alamat_lapangan;?>">
														</div>
														<div class="col-md-12">
															<label for="jenis" class="control-label">Jenis Lapangan</label>
															<select class="form-control" name="jenis">
																<option value="<?php echo $dt->jenis_lapangan;?>"><?php echo $dt->jenis_lapangan;?></option>
																<option value="lapangan matras">lapangan matras</option>
															</select>
														</div>
														<div class="col-md-12">
															<label for="deskripsi" class="control-label">Deskripsi</label>
															<textarea class="form-control" name="deskripsi"><?php echo $dt->deskripsi;?></textarea>
														</div>
													</div>
											</div>
										</div>
										<div class="modal-footer">
													<button type="submit" class="btn btn-success" >Edit</button>
												</form>
										<form method="POST" action="<?php echo site_url('C_pemilik/hapus_lapangan');?>"> 
										<button type="submit" class="btn btn-danger">Hapus</button>
											<input type="hidden" name="id" value="<?php echo $dt->id_lapangan;?>">
											<input type="hidden" class="form-control" name="id_pemilik" value="<?php echo $dt->id_lapangan;?>">
										</form>
									  </div>
									</div>
								  </div>
								</div>
								<?php }}} ?>
								<div class="col-3">
									<div align="center">
										<a href="<?php echo site_url('C_pemilik/tambah_lapangan');?>" class="button button2" style="text-decoration : none;">+</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			include "footer_pemilik.php";
		?>	
	</body>
</html>