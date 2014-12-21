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
				$this->load->view('header_main', $data);
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
			if ($this->session->userdata('logged') and $this->session->userdata('role')=="administrator") {
				$this->load->model('actor_model', 'am');
				$id = $this->uri->segment(3);
				$this->am->deleteActor($id);

				redirect('main', 'refresh');
			} else {
				redirect('login', 'refresh');
			}
		}
		
		public function add_actor() {
			if ($this->session->userdata('logged') and $this->session->userdata('role')=="administrator") {
				$userdata = $this->session->userdata;
				$data = array('userdata' => $userdata, 'add_actor_page' => TRUE);

				$this->load->view('header');
				$this->load->view('header_main', $data);
				$this->load->view('add_actor');
			} else {
				redirect('login', 'refresh');
			}
		}

		public function add_actor_action() {
			$ar = $this->input->post();
			$this->load->model('actor_model', 'am');
			$result = $this->am->addActor($ar);
			if ($result>=0) {
				$this->session->set_flashdata('flashSuccess', 'Вы создали анкету.');
			} else {
				$this->session->set_flashdata('flashError', 'Произошла ошибка.');
			}
			redirect('main/add_actor', 'refresh');
		}

		public function edit_actor() {
			if ($this->session->userdata('logged') and $this->session->userdata('role')=="administrator") {
				$userdata = $this->session->userdata;
				
				$id = $this->uri->segment(3);
				$this->load->model('actor_model', 'am');
				$actordata = $this->am->getActor($id);
				$data = array('userdata' => $userdata, 'edit_actor_page' => TRUE);

				$this->load->view('header');
				$this->load->view('header_main', $data);
				$this->load->view('edit_actor', $actordata);
				
			} else {
				redirect('login', 'refresh');
			}

			
		}

		public function update_actor() {
			if ($this->session->userdata('logged') and $this->session->userdata('role')=="administrator") {
				$ar = $this->input->post();
				$this->load->model('actor_model', 'am');
				$result = $this->am->updateActor($ar);
				if ($result>=0) {
					$this->session->set_flashdata('flashSuccess', 'Вы изменили анкету.');
				} else {
					$this->session->set_flashdata('flashError', 'Произошла ошибка.');
				}
				$url = 'main/edit_actor/'.$ar['id'];
				redirect($url, 'refresh');
				
			} else {
				redirect('login', 'refresh');
			}
		}
		
	}