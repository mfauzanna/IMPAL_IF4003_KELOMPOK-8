<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Regis_Model');
		$this->load->model('Main_Model');
		$this->load->helper('url');
	}
	public function Home()/*Fungsi view page Home*/
	{
		$this->load->view('homepage');
	}
	
	public function CekBooking()/*Fungsi view page Cek Booking*/
	{
		$this->load->view('cekbookingpage');
	}
	
	public function konfirmasi()/*Fungsi view page Konfirmasi*/
	{
		$this->load->view('konfirmasi');
	}
	
	public function daftarpemilik()/*Fungsi view page Daftar Pemilik*/
	{
		$this->load->view('daftarpemilik');
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
			$this->load->view('homepage');
		}else{
			echo '<script>alert("Pendaftaran Gagal, Email Sudah Terdaftar");</script>';
			$this->load->view('homepage');
		}
	}
	
	public function register_pemilik()/*Fungsi input data user pemilik baru*/
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$password = $this->input->post('password');
		$kelamin = $this->input->post('kelamin');
		$nohp = $this->input->post('nohp');
		$data = array(
			'nama_pemilik' => $nama,
			'email_pemilik' => $email,
			'password_pemilik' => $password,
			'alamat_pemilik' => $alamat,
			'nohp_pemilik' => $nohp
		);
		$result = $this->Regis_Model->insert_pemilik($data);
		if($result == true){
			echo '<script>alert("Pendaftaran Berhasil");</script>';
			$this->load->view('homepage');
		}else{
			echo '<script>alert("Pendaftaran Gagal, Email Sudah Terdaftar");</script>';
			$this->load->view('homepage');
		}
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
				$this->load->view('pemilik/home_pemilik');
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
					'kelamin_penyewa' => $result[0]->kelamin_penyewa
				);
				$this->session->set_userdata('loggin',$session_data);
				$data = array(
					'data_lp' => $this->Main_Model->read_data_lapangan()
				);
				$this->load->view('penyewa/home_penyewa',$data);
			}
		}
		else{
			echo '<script>alert("Email atau Password Salah");</script>';
			$this->load->view('homepage');
		}
    }
}