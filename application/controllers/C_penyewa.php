<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penyewa extends CI_Controller {
	
	function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('Main_Model');
	}
	
	public function home_penyewa(){
		$data = array(
			'data_lp_rekom' => $this->Main_Model->read_data_lapangan_dan_pemilik_for_rekom(),
			'data_lp' => $this->Main_Model->read_data_lapangan_dan_pemilik_for_favorit()
		);
		$this->load->view('penyewa/home_penyewa',$data);
	}
	
	public function CekBooking_penyewa()/*Fungsi view page Cek Booking*/
	{
		$this->load->view('penyewa/cekbookingpage_penyewa');
	}
	
	public function CekBooking_result_penyewa($data)/*Fungsi view page Hasil Cek Booking*/
	{
		$this->load->view('penyewa/cekbooking_result_penyewa',$data);
	}
	
	public function konfirmasi_penyewaan($id){
		$result = $this->Main_Model->get_data_pemesanan_by_id($id);
		$data = array (
			'data_pemesanan' => $result
		);
		$this->load->view('penyewa/konfirmasi_penyewaan',$data);
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('');
	}
	
	public function pemesanan(){
		$status = $this->input->post('status');
		if($status == 'Sudah Menyewa'){
			echo '<script>alert("Anda Telah Menyewa Lapangan, Mohon Lakukan Pembayaran Terlebih Dahulu Sebelum Menyewa Lapangan Lain");</script>';
			$this->home_penyewa();
		}else{
			$id_lapangan = $this->input->post('id_lapangan');
			$id_penyewa = $this->input->post('id_penyewa');
			$durasi = $this->input->post('durasi_pemesanan');
			$jam = $this->input->post('jam_pemesanan');
			$tanggal = $this->input->post('tanggal_pemesanan');
			$biaya = $this->input->post('biaya');
			$total_memesan = $this->input->post('total_memesan');
			$email = $this->input->post('email');
			$status_memesan = 'Sudah Menyewa';
			$total_biaya = $biaya * $durasi;
			$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$rand = '';
			for ($i = 0; $i < 2; $i++) {
				$rand .= $characters[rand(0, strlen($characters) - 1)];
			}
			$kode = '#F'.substr(date('Y'),3).date('m').$rand.'0'.$total_memesan;
			$up_total_memesan = $total_memesan + 1;
			$data = array(
				'id_lapangan' => $id_lapangan,
				'id_penyewa' => $id_penyewa,
				'date' => $tanggal,
				'durasi' => $durasi,
				'jam' => $jam,
				'status_pembayaran' => 'Belum Dibayar',
				'status_penyewaan' => 'Belum Selesai',
				'total_biaya' => $total_biaya,
				'kode' => $kode
			);
			$data_penyewa = array(
				'id_penyewa' => $id_penyewa,
				'total_memesan' => $up_total_memesan,
				'status_menyewa' => $status_memesan
			);
			$result = $this->Main_Model->pesan_lapangan($data);
			if($result == TRUE){
				echo '<script>alert("Lapangan Berhasil Dipesan");</script>';
				$this->Main_Model->up_penyewa($data_penyewa);
			}
			else{
				echo '<script>alert("Pemesanan Lapangan Gagal");</script>';
			}
			$this->up_session_penyewa($email);
			$this->home_penyewa();
		}
	}
	
	public function up_session_penyewa($data){
		$result = $this->Main_Model->read_data_penyewa($data);
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
			}
	}
	
	public function cek_booking_user(){
		$kode = $this->input->post('kode');
		$result = $this->Main_Model->get_data_by_booking_code($kode);
		if($result == TRUE){
			$data = array(
				'data_booking' => $result
			);
			$this->CekBooking_result_penyewa($data);
		}
		else{
			echo '<script>alert("Kode Booking Tidak Ada Atau Salah");</script>';
			$this->CekBooking_penyewa();
		}
	}
	
	public function konfirmasi_booking(){
		$config = array(
			'upload_path' => './assets/images/bukti_pembayaran',
			'allowed_types' => 'jpg|png|jpeg',
			'max_size' => '2048000',
			'remove_space' => TRUE 
		);
		$id_penyewa = $this->input->post('id_penyewa');
		$id_lapangan = $this->input->post('id_lapangan');
		$id_pemesanan = $this->input->post('id_pemesanan');
		$jumlah_dipesan = $this->input->post('jml_dipesan') + 1;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('buktipem')) {
			echo '<script>alert("Upload Bukti Pembayaran Gagal");</script>';
		} else {
			$foto = array(
				'file' => $this->upload->data()
			);
			$data_pemesanan = array(
				'id_pemesanan' => $id_pemesanan,
				'bukti_pembayaran' => $foto['file']['file_name'],
				'status_pembayaran' => 'Menunggu Konfirmasi Pemilik',
				'date_pembayaran' => date("Y/m/d")
			);
			$data_lapangan = array(
				'id_lapangan' => $id_lapangan,
				'jumlah_dipesan' => $jumlah_dipesan
			);
			$data_penyewa = array (
				'id_penyewa' => $id_penyewa,
				'status_menyewa' => 'Belum Menyewa'
			);
			$this->Main_Model->up_penyewa($data_penyewa);
			$this->Main_Model->uplapangan($data_lapangan);
			$this->Main_Model->up_pemesanan($data_pemesanan);
			echo '<script>alert("Upload Bukti Pembayaran Berhasil, Silahkan Tunggu Konfirmasi Dari Pemilik");</script>';
		}
		$this->konfirmasi_penyewaan($id_penyewa);
	}
	
	public function batal_pemesanan()
	{
		$id_pemesanan = $this->input->post('id_pemesanan');
		$id_penyewa= $this->input->post('id_penyewa');
		$status_menyewa = 'Belum Menyewa';
		$result = $this->Main_Model->del_pemesanan($id_pemesanan);
		if($result ==  TRUE){
			echo '<script>alert("Pemesanan Berhasil Dibatalkan");</script>';
			$data = array(
				'id_penyewa' => $id_penyewa,
				'status_menyewa' => $status_menyewa
			);
			$this->Main_Model->up_penyewa($data);
		}
		else{
			echo '<script>alert("Pemesanan Gagal Dibatalkan");</script>';
		}
		$this->konfirmasi_penyewaan($id_penyewa);
	}
	
	
}
