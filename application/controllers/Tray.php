<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Tray extends MY_Controller{
		function __construct(){
			parent::__construct();
			if($this->session_role=='sales'){
				redirect('home');
			}
		}

		public function index(){
			
			$data['title'] = 'Daftar Baki';
			$data['is_mobile'] = $this->is_mobile;
			$data['trays'] = $this->crud_model->get_data('tray')->result();
			$this->template->load($this->default,'tray/list_tray',$data);
		
		}

		public function add_tray(){
			if($this->input->post('submit')){
				$data= array(
						'code' => $this->input->post('new_tray'),
					);
	            $this->crud_model->insert_data('suppliers',$data);
	            $this->session->set_flashdata('success',"$.Notify({
				    caption: 'Berhasil',
				    content: 'Supplier telah ditambahkan',
				    type: 'success'
				});");
				redirect('supplier/add_supplier');
			}else{
				$data['title'] = 'Supplier';
				$data['is_mobile'] = $this->is_mobile;
				$this->template->load($this->default,'supplier/add_supplier',$data);
			}
		}
		

	}

?>