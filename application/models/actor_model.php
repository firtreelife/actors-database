<?php
	class Actor_model extends CI_Model {

		public function getActors() {
			$this->db->select('*');
			$this->db->from('actors');
			$query = $this->db->get();

			return $query->result_array();
		}

		public function deleteActor($id) {
			$this->db->where('id', $id);
			$this->db->delete('actors');
			$this->deleteFile($id);
		}

		private function deleteFile($id) {
			$path = $_SERVER['DOCUMENT_ROOT'] . '/actors-database-codeigniter/actors-database/uploads/actors-photos/'. $id;
		    if(is_file($path)) {
		    	unlink($path);
		    }
		}

	}