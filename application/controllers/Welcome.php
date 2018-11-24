<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Regis_Model');
		$this->load->model('Main_Model');
		$this->load->helper('url');
		$this->load->library('unit_test');
	}
	public function Home()/*Fungsi view page Home*/
	{
		$data = array(
					'data_lp_rekom' => $this->Main_Model->read_data_lapangan_dan_pemilik_for_rekom(),
					'data_lp' => $this->Main_Model->read_data_lapangan_dan_pemilik_for_favorit()
				);
		$this->load->view('homepage',$data);
		
	}
	
	public function CekBooking()/*Fungsi view page Cek Booking*/
	{
		$this->load->view('cekbookingpage');
	}
	
	public function CekBooking_result($data)/*Fungsi view page Hasil Cek Booking*/
	{
		$this->load->view('cekbooking_result',$data);
	}
	
	
	public function daftarpemilik()/*Fungsi view page Daftar Pemilik*/
	{
		$this->load->view('daftarpemilik');
	}
	
	public function cari_tipe_lapangan()
	{
		$tipe = $this->input->post('tipe_pencarian');
		if($tipe == 'Lapangan Matras'){
			$data = array(
				'data_lapangan' => $this->Main_Model->read_data_lapangan_matras($tipe)
			);
		}
		else if($tipe == 'Lapangan Rumput'){
			$data = array(
				'data_lapangan' => $this->Main_Model->read_data_lapangan_rumput($tipe)
			);
		}
		$this->load->view('carilapangan',$data);
	}
	
	public function register_penyewa()/*Fungsi input data user penyewa baru*/
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$password = $this->input->post('password');
		$kelamin = $this->input->post('kelamin');
		$nohp = $this->input->post('nohp');
		$data = array(
			'nama_penyewa' => $nama,
			'email_penyewa' => $email,
			'password_penyewa' => $password,
			'alamat_penyewa' => $alamat,
			'nohp_penyewa' => $nohp
		);
		$result = $this->Regis_Model->insert_penyewa($data);
		if($result == true){
			echo '<script>alert("Pendaftaran Berhasil");</script>';
		}else{
			echo '<script>alert("Pendaftaran Gagal, Email Sudah Terdaftar");</script>';
		}
		$this->Home();
	}
	
	public function register_pemilik()/*Fungsi input data user pemilik baru*/
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$password = $this->input->post('password');
		$kelamin = $this->input->post('kelamin');
		$nohp = $this->input->post('nohp');
		$status = 'Belum Menyewa';
		$data = array(
			'nama_pemilik' => $nama,
			'email_pemilik' => $email,
			'kelamin_pemilik' => $kelamin,
			'password_pemilik' => $password,
			'alamat_pemilik' => $alamat,
			'nohp_pemilik' => $nohp
		);
		$result = $this->Regis_Model->insert_pemilik($data);
		if($result == true){
			echo '<script>alert("Pendaftaran Berhasil");</script>';
		}else{
			echo '<script>alert("Pendaftaran Gagal, Email Sudah Terdaftar");</script>';
		}
		$this->Home();
	}
	
	public function cek_login()/*Fungsi login sesuai user yang diinput(penyewa/pemilik)*/
	{
        $data = $this->input->post(null,TRUE);
        $loginpemilik= $this->Main_Model->login_pemilik($data);
		$loginpenyewa= $this->Main_Model->login_penyewa($data);
		if($loginpemilik){
			$email = $data['email'];
			$result = $this->Main_Model->read_data_pemilik($email);
			if($result == TRUE){
				$session_data = array(
					'id_pemilik' => $result[0]->id_pemilik,
					'nama_pemilik' => $result[0]->nama_pemilik,
					'email_pemilik' => $result[0]->email_pemilik,
					'alamat_pemilik' => $result[0]->alamat_pemilik,
					'password_pemilik' => $result[0]->password_pemilik,
					'kelamin_pemilik' => $result[0]->kelamin_pemilik
				);
				$this->session->set_userdata('loggin',$session_data);
				$id_pemilik = $session_data['id_pemilik'];
				$data_pemilik = array (
					'data_lp' => $this->Main_Model->getdata_lapangan_pm($id_pemilik)
				);
				$this->load->view('pemilik/home_pemilik',$data_pemilik);
			}
		}
		else if($loginpenyewa){
			$email = $data['email'];
			$result = $this->Main_Model->read_data_penyewa($email);
			if($result == TRUE){
				$session_data = array(
					'id_penyewa' => $result[0]->id_penyewa,
					'nama_penyewa' => $result[0]->nama_penyewa,
					'email_penyewa' => $result[0]->email_penyewa,
					'alamat_penyewa' => $result[0]->alamat_penyewa,
					'password_penyewa' => $result[0]->password_penyewa,
					'kelamin_penyewa' => $result[0]->kelamin_penyewa,
					'total_memesan' => $result[0]->total_memesan,
					'status_menyewa' => $result[0]->status_menyewa
				);
				$this->session->set_userdata('loggin',$session_data);
				$data = array(
					'data_lp_rekom' => $this->Main_Model->read_data_lapangan_dan_pemilik_for_rekom(),
					'data_lp' => $this->Main_Model->read_data_lapangan_dan_pemilik_for_favorit()
				);
				$this->load->view('penyewa/home_penyewa',$data);
			}
		}
		else{
			echo '<script>alert("Email atau Password Salah");</script>';
			$this->Home();
		}
    }
	
	public function cek_booking_non_user(){
		$kode = $this->input->post('kode');
		$result = $this->Main_Model->get_data_by_booking_code($kode);
		if($result == TRUE){
			$data = array(
				'data_booking' => $result
			);
			$this->CekBooking_result($data);
		}
		else{
			echo '<script>alert("Kode Booking Tidak Ada Atau Salah");</script>';
			$this->CekBooking();
		}
	}
	
	public function testLogin(){
		echo "Unit Testing PHP";
		$test = $this->cek_login();
		$expected_result = FALSE;
		$test_name = "Login Testing";
		echo $this->unit->run($test,$expected_result,$test_name);
	}
	
	public function testDaftar_penyewa(){
		echo "Unit Testing PHP";
		$test = $this->register_penyewa();
		$expected_result = FALSE;
		$test_name = "Daftar Penyewa Testing";
		echo $this->unit->run($test,$expected_result,$test_name);
	}
	
	public function testDaftar_pemilik(){
		echo "Unit Testing PHP";
		$test = $this->register_pemilik();
		$expected_result = FALSE;
		$test_name = "Daftar Pemilik Testing";
		echo $this->unit->run($test,$expected_result,$test_name);
	}

	public function testCari_lapangan(){
		echo "Unit Testing PHP";
		$test = $this->cari_tipe_lapangan();
		$expected_result = FALSE;
		$test_name = "Cari Lapangan Testing";
		echo $this->unit->run($test,$expected_result,$test_name);
	}
	
}
