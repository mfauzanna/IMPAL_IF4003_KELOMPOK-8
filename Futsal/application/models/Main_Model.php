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
		}
		
		
		public function uplapangan($data){
			$this->db->where('id_lapangan',$data['id_lapangan']);
			$this->db->update('lapangan',$data);
			return true;
		}
		
		public function del_lapangan($id){
			$this->db->where('id_lapangan',$id);
			$this->db->from('lapangan');
			$this->db->delete();
			return true;
		}
	
	
	
	}
?>