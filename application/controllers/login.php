<?php
	class Login extends CI_Controller{

		public function index(){
			$this->load->view('header');
			$this->load->view('login');
		}

		public function verify(){
			$userdata = $this->input->post();
			$this->load->model('user_model', 'um');
			$result = $this->um->verifyUser($userdata['username'], $userdata['password']);
			
			if ($result != false) {
				$session_userdata = array('username'=> $result->username, 'role'=>$result->role, 'logged'=>TRUE);
				$this->session->set_userdata($session_userdata);
				redirect('main', 'refresh');
			} else {
				$this->load->view('header');
				$this->load->view('login');
			}
		}

	}