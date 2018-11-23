<?php 
	class Main_Model extends CI_model{
		
		public function login_pemilik($data)
		{
			$this->db->where('email_pemilik',$data['email']);
			$this->db->where('password_pemilik',$data['password']);
			$result = $this->db->get('user_pemilik');
			if($result->num_rows()==1){
				return $result->row(0);
			}else{
				return false;
			}
		}
		
		public function login_penyewa($data)
		{
			$this->db->where('email_penyewa',$data['email']);
			$this->db->where('password_penyewa',$data['password']);
			$result = $this->db->get('user_penyewa');
			if($result->num_rows()==1){
				return $result->row(0);
			}else{
				return false;
			}
		}
	
		public function read_data_pemilik($email)
		{
			$condition = "email_pemilik =" . "'".$email."'";
			$this->db->select('*');
			$this->db->from('user_pemilik');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if($query->num_rows() == 1){
				return $query->result();
			}else{
				return false;
			}
		}
		
		public function read_data_penyewa($email)
		{
			$condition = "email_penyewa =" . "'".$email."'";
			$this->db->select('*');
			$this->db->from('user_penyewa');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if($query->num_rows() == 1){
				return $query->result();
			}else{
				return false;
			}
		}
		
		public function read_data_lapangan(){
			$this->db->select('*');
			$this->db->from('lapangan');
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}
		
		public function read_data_lapangan_matras($tipe){
			$condition= "jenis_lapangan =". "'".$tipe."'";
			$this->db->select('*');
			$this->db->from('lapangan');
			$this->db->join('user_pemilik','user_pemilik.id_pemilik = lapangan.id_pemilik','inner');
			$this->db->where($condition);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}
		
		public function read_data_lapangan_rumput($tipe){
			$condition= "jenis_lapangan =". "'".$tipe."'";
			$this->db->select('*');
			$this->db->from('lapangan');
			$this->db->join('user_pemilik','user_pemilik.id_pemilik = lapangan.id_pemilik','inner');
			$this->db->where($condition);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}
		
		public function read_data_lapangan_dan_pemilik_for_favorit(){
			$this->db->select('*');
			$this->db->from('lapangan');
			$this->db->join('user_pemilik','user_pemilik.id_pemilik = lapangan.id_pemilik','inner');
			$this->db->order_by("jumlah_dipesan","asc");
			$this->db->limit(5);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}
		
		public function read_data_lapangan_dan_pemilik_for_rekom(){
			$this->db->select('*');
			$this->db->from('lapangan');
			$this->db->join('user_pemilik','user_pemilik.id_pemilik = lapangan.id_pemilik','inner');
			$this->db->order_by("id_lapangan","desc");
			$this->db->limit(5);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}

		public function getdata_lapangan($id){
			{
			$condition= "id_lapangan =". "'".$id."'";
			$this->db->select('*');
			$this->db->from('lapangan');
			$this->db->where($condition);
			$query = $this->db->get();
			if($query->num_rows()> 0){
				return $query->result();
			}else{
				return false;
			}
			}
		}
		
		public function getdata_lapangan_pm($id){
			{
			$condition= "id_pemilik =". "'".$id."'";
			$this->db->select('*');
			$this->db->from('lapangan');
			$this->db->where($condition);
			$query = $this->db->get();
			if($query->num_rows()> 0){
				return $query->result();
			}else{
				return false;
			}
			}
		}
			
			
		function ins_lapangan($data)
		{
			return $this->db->insert('lapangan',$data);
			return true;
		}
		
		
		public function uplapangan($data){
			$this->db->where('id_lapangan',$data['id_lapangan']);
			$this->db->update('lapangan',$data);
			return true;
			return true;
		}
		
		public function up_penyewa($data){
			$this->db->where('id_penyewa',$data['id_penyewa']);
			$this->db->update('user_penyewa',$data);
			return true;
		}
		
		public function up_pemesanan($data){
			$this->db->where('id_pemesanan',$data['id_pemesanan']);
			$this->db->update('pemesanan',$data);
			return true;
		}
		
		public function del_lapangan($id){
			$this->db->where('id_lapangan',$id);
			$this->db->from('lapangan');
			$this->db->delete();
			return true;
		}
		
		public function del_pemesanan($id){
			$this->db->where('id_pemesanan',$id);
			$this->db->from('pemesanan');
			$this->db->delete();
			return true;
		}
	
		public function pesan_lapangan($data){
			return $this->db->insert('pemesanan',$data);
		}
		
		public function get_data_by_booking_code($data){
			$condition = "kode =". "'".$data."'";
			$this->db->from('pemesanan');
			$this->db->join('lapangan','lapangan.id_lapangan = pemesanan.id_lapangan','inner');
			$this->db->join('user_penyewa','user_penyewa.id_penyewa = pemesanan.id_penyewa','inner');
			$this->db->join('user_pemilik','user_pemilik.id_pemilik = lapangan.id_pemilik');
			$this->db->where($condition);
			$query = $this->db->get();
			if($query->num_rows()> 0){
				return $query->result();
			}else{
				return false;
			}
		}
		
		public function get_data_pemesanan_by_id($data){
			$this->db->from('user_penyewa');
			$this->db->join('pemesanan','pemesanan.id_penyewa = user_penyewa.id_penyewa','inner');
			$this->db->join('lapangan','lapangan.id_lapangan = pemesanan.id_lapangan','inner');
			$this->db->join('user_pemilik','user_pemilik.id_pemilik = lapangan.id_pemilik');
			$this->db->where('pemesanan.id_penyewa',$data);
			$query = $this->db->get();
			if($query->num_rows()> 0){
				return $query->result();
			}else{
				return false;
			}
		}
		
		public function get_data_pemesanan_by_id_pemilik($data){
			$this->db->from('user_pemilik');
			$this->db->join('lapangan','lapangan.id_pemilik = user_pemilik.id_pemilik','inner');
			$this->db->join('pemesanan','pemesanan.lapangan = lapangan.id_lapangan','inner');
			$this->db->join('user_penyewa','user_penyewa.id_penyewa = pemesanan.id_penyewa');
			$this->db->where('pemesanan.id_pemilik',$data);
			$query = $this->db->get();
			if($query->num_rows()> 0){
				return $query->result();
			}else{
				return false;
			}
		}
	
	}
?>