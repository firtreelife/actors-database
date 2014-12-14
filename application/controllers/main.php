<?php
	session_start();
	class Main extends CI_Controller{

		public function index() {
			if ($this->session->userdata('logged')) {
				$userdata = $this->session->userdata;
				$this->load->model('actor_model', 'am');
				$actorsdata = $this->am->getActors();
				$data = array('userdata' => $userdata, 'actorsdata' => $actorsdata);

				$this->load->view('header');
				$this->load->view('index', $data);
			} else {
				redirect('login', 'refresh');
			}
		}

		public function logout() {
			$this->session->unset_userdata('logged');
   			session_destroy();
   			redirect('main', 'refresh');
		}

		public function delete_actor() {
			$this->load->model('actor_model', 'am');
			$id = $this->uri->segment(3);
			$this->am->deleteActor($id);
			
			$this->index();
		}
		

	}