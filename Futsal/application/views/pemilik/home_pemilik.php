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

		</style>
	</head>
	<body style="font-family: 'Poppins', sans-serif;">
		<?php 
			$sess = $this->session->userdata('loggin'); 
			$id = $sess['id_pemilik'];
			include "header_pemilik.php";
		?>
		<div>
			<div class="img-1" style="max-width:1600px">
				<img src="<?php echo base_url('assets/images/bg3.jpg');?>" style="width:100%; height : 600px;">
			</div>
		</div>
		<?php
			include "footer_pemilik.php";
		?>	
	</body>
</html>