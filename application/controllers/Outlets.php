<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Outlets extends MY_Controller{

		function __construct(){
			parent::__construct();
				
		}

		public function add_outlet(){
			if($this->input->post('add')){
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
						'password'		=> hash_password($this->input->post('outlet_password')),
						'name'			=> $this->input->post('outlet_manager'),
						'role'			=> 'manager',
						'outlet_id'		=> $outlet_id
					);

					if($this->crud_model->insert_data('accounts',$data_account)){
						$this->session->set_flashdata('outlet', "$.Notify({caption: 'Berhasil !', content: 'Toko berhasil dibuat', type: 'info'});");
						$data['title'] = 'Outlet';
						$this->template->load('default','outlets/add_outlet',$data);
					}
				}else{
					$this->session->set_flashdata('outlet', "$.Notify({caption: 'Toko Gagal Dibuat!', content: 'Periksa kembali data toko', type: 'alert'});");
					
					$data['title'] = 'Outlet';
					$this->template->load('default','outlets/add_outlet',$data);
				}				

				
			}else{
				$data['title'] = 'Outlet';
				$this->template->load('default','outlets/add_outlet',$data);
			}
		}

		public function list_outlet(){
			
			$data['title'] = 'Outlet';
			$data['is_mobile'] = $this->is_mobile;
			$this->template->load('default','outlets/list_outlet',$data);
		
		}

	}

 ?>