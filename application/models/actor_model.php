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

		public function addActor($ar) {
			$date_of_birth = $ar['year']."-".$ar['month']."-".$ar['day'];
			unset($ar['year'], $ar['month'], $ar['day']);
			$ar['date_of_birth'] = $date_of_birth;
			$ar['lang_ru'] = isset($ar['lang_ru']) ? 1 : 0;
			$ar['lang_lv'] = isset($ar['lang_lv']) ? 1 : 0;
			$ar['lang_en'] = isset($ar['lang_en']) ? 1 : 0;
			$this->db->insert('actors', $ar);
			$id = $this->db->insert_id();
			$this->uploadImage($id);
			return $this->db->affected_rows();
		}

		private function uploadImage($id) {
			if (isset ($_FILES['photos'])){
				$error = $_FILES['photos']['error'];

				if ($error == UPLOAD_ERR_OK) {
					//if ($_FILES["actor_photos"]["size"]>10000) die('size too big');
					$tmp_name = $_FILES["photos"]["tmp_name"];
					$name = $_FILES["photos"]["name"];
					$name = addslashes($name);

					$data = array('photos' => $name);
					$this->db->where('id', $id);
					$this->db->update('actors', $data);
					
					$path = $_SERVER['DOCUMENT_ROOT'] . '/actors-database-codeigniter/actors-database/uploads/actors-photos/' . $id;
					// $path = 'uploads/actors-photos/' . $id;
					move_uploaded_file($tmp_name, $path);

				}
			}
		}

		public function getActor($id) {
			$this->db->select('*');
			$this->db->from('actors');
			$this->db->where('id', $id);
			$query = $this->db->get();

			$result = $query->result_array();
			$result = $result[0];
			$result['date_of_birth'] = explode("-", $result['date_of_birth']); 
			return $result;
		}

		public function updateActor($ar) {
			$id = $ar['id'];
			$ar['lang_ru'] = isset($ar['lang_ru']) ? 1 : 0;
			$ar['lang_lv'] = isset($ar['lang_lv']) ? 1 : 0;
			$ar['lang_en'] = isset($ar['lang_en']) ? 1 : 0;
			$date_of_birth = $ar['year']."-".$ar['month']."-".$ar['day'];
			unset($ar['year'], $ar['month'], $ar['day'], $ar['id']);
			$ar['date_of_birth'] = $date_of_birth;

			$this->db->where('id', $id);
			$this->db->update('actors', $ar);
			
			$this->uploadImage($id);
			return $this->db->affected_rows();
		}

	}