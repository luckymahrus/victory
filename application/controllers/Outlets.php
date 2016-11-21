<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Outlets extends MY_Controller{

		private $user_role;
		private $user_id;

		function __construct(){
			parent::__construct();
			$this->user_role = $this->session->userdata('user_role');
			$this->user_id = $this->session->userdata('user_id');
			$this->load->model('outlets_model');
		}

		public function index(){
			
			$data['title'] = 'Outlet';
			$data['is_mobile'] = $this->is_mobile;
			$data['outlets'] = $this->crud_model->get_data('outlets')->result();
			$this->template->load('default','outlets/list_outlet',$data);
		
		}

		public function add_outlet(){
			if($this->input->post()){
				$data_outlet = array(
						'name'			=> $this->input->post('outlet_name'),
						'code'			=> $this->input->post('outlet_code'),
						'phone'			=> $this->input->post('outlet_phone'),
						'store_manager'	=> $this->input->post('outlet_manager'),
						'address'		=> $this->input->post('outlet_address'),
						'margin'		=> $this->input->post('outlet_margin')
					);
				if($this->db->insert('outlets',$data_outlet)){
					$outlet_id = $this->db->insert_id();
					
					$data_account = array(
						'username'		=> $this->input->post('outlet_username'),
						'name'			=> $this->input->post('outlet_manager'),
					);
					
					if($this->input->post('outlet_password') != ''){
						$data_account['password'] = hash_password($this->input->post('outlet_password'));
					}

					$this->crud_model->insert_data('accounts',$data_account);
					$this->session->set_flashdata('outlet', "$.Notify({caption: 'Berhasil !', content: 'Toko berhasil dibuat', type: 'info'});");
					
				}else{
					$this->session->set_flashdata('outlet', "$.Notify({caption: 'Toko Gagal Dibuat!', content: 'Periksa kembali data toko', type: 'alert'});");
				}				

				redirect('outlets/add_outlet');
			}else{
				$data['title'] = 'Outlet';
				$this->template->load('default','outlets/add_outlet',$data);
			}
		}

		public function edit_outlet($outlet_id = ''){
			if($this->input->post()){
				$data_outlet = array(
						'name'			=> $this->input->post('outlet_name'),
						'code'			=> $this->input->post('outlet_code'),
						'phone'			=> $this->input->post('outlet_phone'),
						'store_manager'	=> $this->input->post('outlet_manager'),
						'address'		=> $this->input->post('outlet_address'),
						'margin'		=> $this->input->post('outlet_margin')
					);
				
				
				
				$data_account = array(
					'username'		=> $this->input->post('outlet_username'),
					'password'		=> hash_password($this->input->post('outlet_password')),
					'name'			=> $this->input->post('outlet_manager'),
				);

				$this->crud_model->update_data('accounts',$data_account,array('outlet_id' => $outlet_id,'role' => 'manager'));
				$this->session->set_flashdata('outlet', "$.Notify({caption: 'Berhasil !', content: 'Toko berhasil dibuat', type: 'info'});");
					
								

				redirect('outlets/add_outlet');

			}else{
				$data['title'] = 'Outlet';
				$data['outlet']	= $this->outlets_model->get_outlet($outlet_id);
				$this->template->load('default','outlets/edit_outlet',$data);
			}
		}

		

	}

 ?>