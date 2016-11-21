<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Customer extends MY_Controller{
		function __construct(){
			parent::__construct();
		}

		public function index(){
			//customer main page
			
			$data['title'] = 'Customer';
			$data['is_mobile'] = $this->is_mobile;
			$data['customers'] = $this->crud_model->get_data('customers')->result();
			$this->template->load('default','customer/list_customer',$data);
		
		}

		public function add_customer(){
			if($this->input->post()){
	            $data = array(

	            		'name' => $this->input->post('customer_name'),
	            		'type' => $this->input->post('customer_type'),
	            		'phone' => $this->input->post('customer_phone'),
	            		'email' => $this->input->post('customer_email'),
	            		'address' =>$this->input->post('customer_address')

	            	);

	            $this->crud_model->insert_data('customers',$data);
	            $this->session->set_flashdata('success',"$.Notify({
				    caption: 'Berhasil',
				    content: 'Berhasil tambah customer',
				    type: 'success'
				});");
	            redirect('customer/add_customer');

			}else{
				$data['title'] = 'Customer';
				$data['is_mobile'] = $this->is_mobile;
				$this->template->load('default','customer/add_customer',$data);
			}
		}

		

	}

?>