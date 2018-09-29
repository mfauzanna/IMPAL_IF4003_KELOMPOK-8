<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penyewa extends CI_Controller {
	
	function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->model('Main_Model');
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	public function pesan($id_lapangan){
		$data = array(
			'data_lp' => $this->Main_Model->getdata_lapangan($id_lapangan)
		);
		$this->load->view('penyewa/pemesanan',$data);
	}
	
	public function home_penyewa(){
		$data = array(
			'data_lp' => $this->Main_Model->read_data_lapangan()
		);
		$this->load->view('penyewa/home_penyewa',$data);
	}
	
	
}
