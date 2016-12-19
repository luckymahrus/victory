<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Sale extends MY_Controller{

		function __construct(){
			parent::__construct();
			if($this->session_role=='admin'){
				redirect('home');
			}

		}

		public function index(){
			$outlet_code = $this->db->get_where('outlets',array('id' => $this->session_outlet))->row('code');
			$code = $this->db->get_where('code',array('code' => $outlet_code.'JU'))->row();
			if($code){
				$data['sale_code'] = $code->code.sprintf("%05d", $code->count);
				$data['hidden_code'] = $code->code;
				$data['hidden_count'] = $code->count;
			}else{
				$this->db->insert('code',array('code' => $outlet_code.'JU','count' => 1));
				$data['sale_code'] = $outlet_code.'JU'.sprintf("%05d", 1);
				$data['hidden_code'] = $outlet_code.'JU';
				$data['hidden_count'] = 1;	
			}
			
			$data['title'] = 'Penjualan';
			$this->template->load($this->default,'sale/new_sale',$data);
		
		}

		
			
		

	}

 ?>