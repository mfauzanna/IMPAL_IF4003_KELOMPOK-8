<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pemilik extends CI_Controller {
	
	function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('Main_Model');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	public function tambah_lapangan()
	{
		$this->load->view('pemilik/tambah_lapangan');
	}
	
	public function home_pemilik($id)
	{
		$data = array  
			(
				'data_lp' => $this->Main_Model->getdata_lapangan_pm($id)
			);
			$this->load->view('pemilik/home_pemilik',$data);
	}
	
	public function konfirmasi_penyewaan($id){
		$result = $this->Main_Model->get_data_pemesanan_by_id($id);
		$data = array (
			'data_pemesanan' => $result
		);
		$this->load->view('pemilik/konfirmasi_pemilik',$data);
	}
	
	public function insert_lapangan()
	{
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$jenis = $this->input->post('jenis');
		$deskripsi = $this->input->post('deskripsi');
		$status = $this->input->post('status');
		$id_pemilik = $this->input->post('id_pemilik');
		$config = array(
			'upload_path' => './assets/images/lapangan',
			'allowed_types' => 'jpg|png|jpeg',
			'max_size' => '2048000',
			'remove_space' => TRUE 
		);
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto1')) {
			echo '<script>alert("Upload Gagal");</script>';
			$this->load->view('pemilik/tambah_lapangan');
		} else {
			$foto = array(
				'file' => $this->upload->data()
			);
			$data_lapangan = array(
				'nama_lapangan' => $nama,
				'foto_lp1' => $foto['file']['file_name'],
				'alamat_lapangan' => $alamat,
				'jenis_lapangan' => $jenis,
				'deskripsi' => $deskripsi,
				'id_pemilik' => $id_pemilik
			);
			$this->Main_Model->ins_lapangan($data_lapangan);
			echo '<script>alert("Lapangan Berhasil Ditambahkan");</script>';
		}
		$this->home_pemilik($id_pemilik);
	}
	
	public function update_lapangan()
	{	
		$id_pemilik = $this->input->post('id_pemilik');
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$jenis = $this->input->post('jenis');
		$desk = $this->input->post('deskripsi');
		$status = $this->input->post('status');
		$data = array (
			'id_lapangan' => $id,
			'nama_lapangan' => $nama,
			'alamat_lapangan' => $alamat,
			'jenis_lapangan' => $jenis,
			'deskripsi' => $desk,
			'status' => $status
		);
		$result = $this->Main_Model->uplapangan($data);
		if($result == TRUE){
			echo '<script>alert("Pembaruan Data Lapangan Berhasil");</script>';		
		}
		else{
			echo '<script>alert("Pembaruan Data Lapangan Berhasil");</script>';
		}
		$this->home_pemilik($id_pemilik);
	}
	
	public function hapus_lapangan()
	{
		$id_pemilik = $this->input->post('id_pemilik');
		$id = $this->input->post('id');
		$result = $this->Main_Model->del_lapangan($id);
		if($result == TRUE){
			echo '<script>alert("Data Lapangan Berhasil Dihapus");</script>';		
		}
		else{
			echo '<script>alert("Data Lapangan Berhasil Dihapus");</script>';
		}
		$this->home_pemilik($id_pemilik);
	}
	
	public function konfirmasi_pemilik()
	{
		$id_pemilik = $this->input->post('id_pemilik');
		$id_pemesanan = $this->input->post('id_pemesanan'); 
		$status_pembayaran = 'Telah Dikonfirmasi';
		$data = array(
			'id_pemesanan' => $id_pemesanan,
			'status_pembayaran' => $status_pembayaran
		);
		$result = $this->Main_Model->up_pemesanan($data);
		if($result == TRUE){
			echo '<script>alert("Pemesanan Berhasil Dikonfirmasi");</script>';		
		}
		else{
			echo '<script>alert("Pemesanan Gagal Dikonfirmasi");</script>';
		}
		$this->konfirmasi_penyewaan($id_pemilik);
	}
	
	public function penyewaan_selasai(){
		$id_pemilik = $this->input->post('id_pemilik');
		$id_pemesanan = $this->input->post('id_pemesanan'); 
		$status_penyewaan = 'Selesai';
		$data = array(
			'id_pemesanan' => $id_pemesanan,
			'status_penyewaan' => $status_penyewaan
		);
		$result = $this->Main_Model->up_pemesanan($data);
		if($result == TRUE){
			echo '<script>alert("Pembaruan Behasil");</script>';		
		}
		else{
			echo '<script>alert("Pembaruan Gagal");</script>';
		}
		$this->konfirmasi_penyewaan($id_pemilik);
	}
	
	
	
}
