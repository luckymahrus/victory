<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Product extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('product_model');
		}

		public function index(){
			if($this->session_role != 'admin'){
				//customer main page
				
				$data['title'] = 'Product';
				$data['is_mobile'] = $this->is_mobile;
				$data['products'] = $this->product_model->get_product_outlet($this->session_outlet);
				$this->template->load($this->default,'product/list_product',$data);
			}else{
				//customer main page
				
				$data['title'] = 'Product';
				$data['is_mobile'] = $this->is_mobile;
				$data['products'] = $this->product_model->get_product_all_outlet();
				$this->template->load($this->default,'product/list_product',$data);	
			}
			

		
		}

		public function upload(){
			//upload image via webcam

			$this->load->library('image_moo');

			$config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 5000;					
			$config['upload_path']          = 'uploads/temp/product/'.$this->session_outlet.'/'.$this->session_id;
			$config['overwrite']			= True;
			$config['file_name']			= 'product'.$this->session_id.'.jpg';
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

            //resize image
            $this->image_moo
				->load($photo)
				->resize_crop(400,400)
				->save($photo,TRUE);

		}

		public function add_product(){
			if($this->session_role != 'manager'){
				redirect('home');
			}
			if($this->input->post()){
				$this->load->library('image_moo');

				$config['allowed_types']        = 'jpg|png|jpeg';
	            $config['max_size']             = 5000;					
				$config['upload_path']          = 'uploads/photo/product/'.$this->input->post('product_tray');
				$config['overwrite']			= false;
				$config['file_name']			= $this->input->post('product_code').'.jpg';
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

	            	$photo = $config ['upload_path'] . '/' . $config ['file_name'];

					rename('uploads/temp/product/'.$this->session_outlet.'/'.$this->session_id.'/'.'product'.$this->session_id.'.jpg' , $photo);	
					
	            }

	             //resize image
            	$this->image_moo
					->load($photo)
					->resize_crop(400,400)
					->save($photo,TRUE);

	            //check if user upload a photo or not.
				if(!file_exists($photo))
				{
					
					$photo = '';
				}

	            $data_product = array(

	            		'name'			=> $this->input->post('product_name'),
	            		'product_code'	=> $this->input->post('product_code'),
	            		'type'			=> $this->input->post('product_type'),
	            		'category'		=> $this->input->post('product_category'),
	            		'real_weight'	=> $this->input->post('product_real_weight'),
	            		'rounded_weight'=> $this->input->post('product_rounded_weight'),
	            		'selling_price'	=> $this->input->post('product_selling_price'),
	            		'gold_amount'	=> $this->input->post('gold_amount'),
	            		'tray_id'		=> $this->input->post('product_tray'),
	            		'photo'			=> $photo,
	            		'outlet_id'		=> $this->session_outlet,

	            	);

	            $this->db->update('code',array('count' => $this->input->post('count')+1),array('code' => $this->input->post('code')));

	            if($this->crud_model->insert_data('products',$data_product)){
	            	$this->session->set_flashdata('product',"$.Notify({
					    caption: 'Berhasil',
					    content: 'Berhasil tambah produk',
					    type: 'success'
					});");	
	            }else{
	            	$this->session->set_flashdata('product',"$.Notify({
					    caption: 'Gagal',
					    content: 'Gagal menambah produk',
					    type: 'alert'
					});");
	            }
	            
	            redirect('product/add_product');

			}else{
				$data['title'] = 'Product';
				$data['is_mobile'] = $this->is_mobile;
				$data['trays'] = $this->db->get_where('tray', array('outlet_id' => $this->session_outlet))->result();
				$data['gold_amount'] = $this->db->get('gold_amount')->result();
				$this->template->load($this->default,'product/add_product',$data);
			}
		}

		public function edit_customer($cust_id = ''){
			if($this->input->post()){
	            $data_customer = array(

	            		'name' => $this->input->post('customer_name'),
	            		'type' => $this->input->post('customer_type'),
	            		'phone' => $this->input->post('customer_phone'),
	            		'email' => $this->input->post('customer_email'),
	            		'address' =>$this->input->post('customer_address')

	            	);

	            if($this->crud_model->update_data('customers',$data_customer,array('id' => $cust_id))){
	            	$this->session->set_flashdata('customer',"$.Notify({
					    caption: 'Berhasil',
					    content: 'Berhasil edit customer',
					    type: 'success'
					});");
	            }else{
	            	$this->session->set_flashdata('Customer',"$.Notify({
					    caption: 'Gagal',
					    content: 'Gagal edit customer',
					    type: 'success'
					});");
	            }
	            
	            redirect('customer');

			}else{
				$data['title'] = 'Customer';
				$data['is_mobile'] = $this->is_mobile;
				$data['customer'] = $this->crud_model->get_by_condition('customers',array('id' => $cust_id))->row();
				$this->template->load($this->default,'customer/edit_customer',$data);
			}
		}

		public function delete_customer($cust_id = ''){
		
			if($this->crud_model->delete_data('customers',array('id' => $cust_id))){
				$this->session->set_flashdata('customer', "$.Notify({caption: 'Berhasil !', content: 'Customer berhasil dihapus', type: 'info'});");
			}else{
				$this->session->set_flashdata('customer', "$.Notify({caption: 'Gagal !', content: 'Customer gagal dihapus', type: 'alert'});");
			}
			
			redirect('customer');
		}

		public function get_data_new_product($tray_id = ''){
			$this->load->model('tray_model');
			$outlet_code = $this->db->get_where('outlets',array('id' => $this->session_outlet))->row('code');
			$tray = $this->tray_model->get_specific_tray($tray_id);
			$code = $this->db->get_where('code',array('code' => $outlet_code.$tray->code))->row();
			if($code){
				$data = (array) $tray;
				$data['product_code'] = $code->code.sprintf("%05d", $code->count);
				$data['hidden_code'] = $code->code;
				$data['hidden_count'] = $code->count;
				$data = (Object) $data;
				echo json_encode($data);
			}else{
				$this->db->insert('code',array('code' => $outlet_code.$tray->code,'count' => 1));
				$data = (array) $tray;
				$data['product_code'] = $outlet_code.$tray->code.sprintf("%05d", 1);
				$data['hidden_code'] = $outlet_code.$tray->code;
				$data['hidden_count'] = 1;
				$data = (Object) $data;
				echo json_encode($data);
				
			}
		}

		public function count_gold_amount($gold_amount_id = ''){
			$gold_amount = $this->db->get_where('gold_amount',array('id'=>$gold_amount_id))->row();
			$gold_amount = (array) $gold_amount;
			echo json_encode($gold_amount);

		}
		

	}

?>