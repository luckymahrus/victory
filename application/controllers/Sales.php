<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Sales extends MY_Controller{

		function __construct(){
			parent::__construct();
				
		}

		public function upload(){
			$config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 5000;					
			$config['upload_path']          = 'uploads/foto/';
			$config['overwrite']			= True;
			$config['file_name']			= 'photo.jpg';
			$this->upload->initialize($config);

			//Check if the folder for the upload existed
			if(!file_exists($config['upload_path']))
			{
				//if not make the folder so the upload is possible
				mkdir($config['upload_path'], 0777, true);
			}

            if ($this->upload->do_upload('webcam'))
            {
                //Get the link for the database
                $photo = $config ['upload_path'] . '/' . $config ['file_name'];
            }

		}

		public function add_sales(){
			if($this->input->post('add')){
				
	            print_r($this->input->post());
			}else{
				$data['title'] = 'Sales';
				$data['is_mobile'] = $this->is_mobile;
				$this->template->load('default','sales/add_sales',$data);
			}
		}

	}

 ?>