<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Sales extends MY_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('sales_model');

		}


		public function upload(){
			$config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 5000;					
			$config['upload_path']          = 'uploads/temp/sales/'.$this->session_outlet.'/'.$this->session_id.'/';
			$config['overwrite']			= True;
			$config['file_name']			= 'sales'.$this->session_id.'.jpg';
			$this->upload->initialize($config);

			//Check if the folder for the upload existed
			if(!file_exists($config['upload_path']))
			{
				//if not make the folder so the upload is possible
				mkdir($config['upload_path'], 0777, true);
			}

            if($this->upload->do_upload('webcam'))
            {
                //Get the link for the database
                $photo = $config ['upload_path'] . '/' . $config ['file_name'];
            }

		}

		public function add_sales(){
			if($this->input->post()){

				$config['allowed_types']        = 'jpg|png|jpeg';
	            $config['max_size']             = 5000;					
				$config['upload_path']          = 'uploads/photo/sales/';
				$config['overwrite']			= false;
				$config['file_name']			= 'sales-'.substr($this->input->post('sales_name'),0,3).'.jpg';
				$this->upload->initialize($config);

				//Check if the folder for the upload existed
				if(!file_exists($config['upload_path']))
				{
					//if not make the folder so the upload is possible
					mkdir($config['upload_path'], 0777, true);
				}

	            if($this->upload->do_upload('capture'))
	            {
	                //Get the link for the database
	                $photo = $config ['upload_path'] . '/' . $config ['file_name'];
	            }else{
	            	rename('uploads/temp/sales/'.$this->session_outlet.'/'.$this->session_id.'/'.'sales'.$this->session_id.'.jpg' , $config ['upload_path'] . '/' . $config ['file_name']);
	            	$photo = $config ['upload_path'] . '/' . $config ['file_name'];
	            }

				if(!file_exists($photo))
				{
					//if not make the folder so the upload is possible
					$photo = '';
				}				
		            
	            $data_sales = array(
	            		'name'		=> $this->input->post('sales_name'),
	            		'photo'		=> $photo,
	            		'address'	=> $this->input->post('sales_address'),
	            		'phone'		=> $this->input->post('sales_phone'),
	            		'username'	=> $this->input->post('sales_username'),
	            		'password'	=> hash_password($this->input->post('sales_password')),
	            		'outlet_id'	=> $this->input->post('sales_outlet'),
	            		'role'		=> 'sales'
	            	);

	            $this->crud_model->insert_data('accounts',$data_sales);

	            $this->session->set_flashdata('sales', "$.Notify({caption: 'Berhasil !', content: 'Sales berhasil ditambahkan', type: 'info'});");

	   //          $data['title'] = 'Sales';
				// $data['outlets'] = $this->crud_model->get_data('outlets')->result();
				// $data['is_mobile'] = $this->is_mobile;
				// $this->template->load('default','sales/add_sales',$data);
	            redirect('sales/add_sales');

			}else{
				$data['title'] = 'Sales';
				$data['outlets'] = $this->crud_model->get_data('outlets')->result();
				$data['is_mobile'] = $this->is_mobile;
				$this->template->load('default','sales/add_sales',$data);
			}
		}

		public function list_sales(){
			
			$data['title'] = 'Sales';
			$data['sales'] = $this->sales_model->get_all_sales();
			$data['is_mobile'] = $this->is_mobile;
			$this->template->load('default','sales/list_sales',$data);
		
		}

			
		

	}

 ?>