<?php 
	class Regis_Model extends CI_model{
		
		function insert_penyewa($data){
			$condition = "email_penyewa= '".$data['email_penyewa']."'";
			$this->db->select('*');
			$this->db->from('user_penyewa');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				$this->db->insert('user_penyewa',$data);
				if($this->db->affected_rows() > 0){
					return true;
				}
				else{
					return false;
				}
			}
		}
		
		function insert_pemilik($data){
			$condition = "email_pemilik= '".$data['email_pemilik']."'";
			$this->db->select('*');
			$this->db->from('user_pemilik');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				$this->db->insert('user_pemilik',$data);
				if($this->db->affected_rows() > 0){
					return true;
				}
				else{
					return false;
				}
			}
		}

	}
?>