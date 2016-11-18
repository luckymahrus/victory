<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Supplier extends MY_Controller{
		function __construct(){
			parent::__construct();
		}
		public function add_supplier(){
			if($this->input->post('submit')){
				$data= array(
						'name' => $this->input->post('supplier_name'),
						'phone' => $this->input->post('supplier_phone'),
						'address' => $this->input->post('supplier_address'),
						'email' => $this->input->post('supplier_email'),
						'description' => $this->input->post('supplier_desc')
					);
	            $this->crud_model->insert_data('suppliers',$data);
	            $this->session->set_flashdata('success',"$.Notify({
				    caption: 'Berhasil',
				    content: 'Supplier telah ditambahkan',
				    type: 'success'
				});");
				redirect($this->session_role);
			}else{
				$data['title'] = 'Supplier';
				$data['is_mobile'] = $this->is_mobile;
				$this->template->load('default','supplier/add_supplier',$data);
			}
		}
		public function list_supplier(){
			
			$data['title'] = 'Supplier';
			$data['is_mobile'] = $this->is_mobile;
			$data['suppliers'] = $this->crud_model->get_data('suppliers')->result();
			$this->template->load('default','supplier/list_supplier',$data);
		
		}

	}

?>