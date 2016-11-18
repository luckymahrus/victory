<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Accounts extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('accounts_model');
			
		}

		public function index(){
			
			$this->login();

		}

		public function login(){
			if($this->session->userdata('is_logged')){
				redirect($this->session->userdata('user_role'));
			}
			if($this->input->post()){
				$username = $this->input->post('username');
				$password = hash_password($this->input->post('password'));

				if($user = $this->accounts_model->check_user($username,$password)){
					$data_session = array(
							'user_id'	=> $user->id,
							'user_role'	=> $user->role,
							'is_logged'	=> true,
						);
					$this->session->set_userdata($data_session);

					$this->session->set_flashdata('success',"$.Notify({caption: 'Login Sukses !', content: 'Selamat Datang ,".$user->name."', type: 'info'});");

					redirect($user->role);

				}else{
					$this->session->set_flashdata('failed',"$.Notify({caption: 'Login Gagal !', content: 'Username atau Password salah', type: 'alert'});");

					$this->load->view('login');
				}


			}else{
				
				$this->load->view('login');
			}
		}

		public function logout(){
			$this->session->sess_destroy();
			$this->session->set_flashdata('failed',"$.Notify({caption: 'Logout Sukses !', content: '', type: 'alert'});");
			$this->load->view('login');
		}

	}

 ?>