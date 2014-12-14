<?php
	class User_model extends CI_Model {

		public function verifyUser($username, $password) {
			$this->db->select('*');
   			$this->db->from('users');
   			$this->db->where('username', $username);
   			$this->db->where('password', SHA1($password));
   			$this->db->limit(1);
 
   			$query = $this->db->get();
 
   			if($query->num_rows() == 1) {
   				$result = $query->result();
     			return $result[0];
   			} else {
     			return false;
   			}
		}
	}