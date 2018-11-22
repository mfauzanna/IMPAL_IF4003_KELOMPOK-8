<html>
	<head>
		<title>Lets Futsal</title>
		<script></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
			.bg{
				margin-top : 170px;
				margin-bottom : 100px;
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
			<?php echo form_open_multipart('C_pemilik/insert_lapangan');?>
				<div class="bg container col-6">
					<div class="card-header">
						<h2 align="center">Form Tambah Lapangan</h2>
					</div>
					<div class="card-body">
						<div class="col-md-12">
							<label for="nama" class="control-label">Nama Lapangan</label>
							<input type="name" class="form-control" name="nama">
						</div>
						<div class="col-md-12">
							<label for="alamat" class="control-label">Alamat</label>
							<textarea type="text" class="form-control" name="alamat"></textarea>
						</div>
						<div class="col-md-12">
							<label for="deskripsi" class="control-label">Deskripsi Lapangan</label>
							<textarea type="text" class="form-control" name="deskripsi"></textarea>
						</div>
						<div class="col-md-12">
							<label for="alamat" class="control-label">Jenis Lapangan</label>
						</div>
						<div class="col-md-12">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="jenis" value="Lapangan Rumput" checked>
								<label class="form-check-label" for="exampleRadios1">Lapangan Rumput</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="jenis" value="Lapangan Matras">
								<label class="form-check-label" for="exampleRadios2">Lapangan Matras</label>
							</div>
						</div>
						<div class="col-md-12">
							<label for="foto1" class="control-label">Foto Lapangan</label>
							<input type="file" class="form-control" name="foto1">
						</div>
							<input type="hidden" value="Belum Dipesan" name="status">
							<input type="hidden" value="<?php echo $sess['id_pemilik']; ?>" name="id_pemilik">
					</div>
					<div class="card-footer text-muted">
						<input type="submit" class="container btn btn-success" value="Tambah Lapangan">
					</div>
				</div>
			</form>
		</div>
		<?php
			include "footer_pemilik.php";
		?>	
	</body>
</html>