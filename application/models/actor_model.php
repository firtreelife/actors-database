<?php
	class Actor_model extends CI_Model {

		public function getActors() {
			$this->db->select('*');
			$this->db->from('actors');
			$query = $this->db->get();

			return $query->result_array();
		}


	}