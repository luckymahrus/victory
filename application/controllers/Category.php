<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Category extends MY_Controller{

		function __construct(){
			parent::__construct();
			
		}

		public function check_code($category_id, $number){
			$category_code = $this->db->get_where('category',array('id' => $category_id))->row('code');
			$tray_code = $this->db->get_where('tray',array('code' => $category_code.$number,'outlet_id' => $this->session_outlet))->row('code');
			if($tray_code != NULL){
				echo 'taken';
			}else{
				echo $category_code.$number;
			}
		}

		public function index(){
			if($this->session_role != 'admin'){
				redirect('home');	
			}
			$data['title'] = 'Category';
			$data['category_diamond'] = $this->crud_model->get_by_condition('category',array('type_id' => 2))->result();
			$data['category_gold'] = $this->crud_model->get_by_condition('category',array('type_id' => 1))->result();
			$this->template->load($this->default,'category/list_category',$data);
			

		}

		public function add_category(){
			if($this->session_role != 'admin'){
				redirect('home');	
			}
			if($this->input->post('submit')){
				$data= array(
						'name'	=> $this->input->post('category_name'),
						'code' => ucfirst($this->input->post('category_code')),
						'type_id'=> $this->input->post('category_type')
				);
	            $this->crud_model->insert_data('category',$data);
	            $this->session->set_flashdata('category',"$.Notify({
				    caption: 'Berhasil',
				    content: 'Kategori telah ditambahkan',
				    type: 'success'
				});");
				redirect('category');
			}else{
				$data['title'] = 'Daftar Kategori';
				$this->template->load($this->default,'category/list_category',$data);
			}
		}

	}

 ?>