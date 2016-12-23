<?php 
	
class Product_model extends CI_Model{

	function get_product_all_outlet(){
		$this->db->select('products.*,outlets.name as outlet, tray.code as tray,gold_amount.original,gold_amount.marked_up,gold_amount.type as amount_type');
		$this->db->from('products');
		$this->db->join('outlets','outlets.id = products.outlet_id');
		$this->db->join('tray','tray.id = products.tray_id');
		$this->db->join('gold_amount','gold_amount.id = products.gold_amount');
		$this->db->where('products.status','available');
		$this->db->order_by('products.product_code','asc');
		return $this->db->get()->result();
	}

	function get_product_outlet($outlet_id = ''){
		$this->db->select('products.*,outlets.name as outlet, tray.code as tray,gold_amount.original,gold_amount.marked_up,gold_amount.type as amount_type');
		$this->db->from('products');
		$this->db->join('outlets','outlets.id = products.outlet_id');
		$this->db->join('tray','tray.id = products.tray_id');
		$this->db->join('gold_amount','gold_amount.id = products.gold_amount');
		if($outlet_id != ''){
			$this->db->where('products.outlet_id',$outlet_id);	
		}
		$this->db->where('products.status','available');
		$this->db->order_by('products.product_code','asc');
		return $this->db->get()->result();
	}

	function get_product_by_code($product_code = '', $outlet_id = ''){
		$this->db->select('products.*,outlets.name as outlet, tray.code as tray,gold_amount.original,gold_amount.marked_up,gold_amount.type as amount_type');
		$this->db->from('products');
		$this->db->join('outlets','outlets.id = products.outlet_id');
		$this->db->join('tray','tray.id = products.tray_id');
		$this->db->join('gold_amount','gold_amount.id = products.gold_amount');
		$this->db->where('products.product_code',$product_code);
		$this->db->where('products.outlet_id',$outlet_id);
		$this->db->where('products.status','available');
		$this->db->order_by('products.product_code','asc');
		return $this->db->get()->row();
	}

	function get_mutation_detail($outlet_id = '',$mutation_code = ''){
		$this->db->select('mutation_product.*, products.name, products.photo, products.real_weight, products.rounded_weight');
		$this->db->from('mutation_product');
		$this->db->join('mutation','mutation.mutation_code = mutation_product.mutation_code','left');
		$this->db->join('products','products.product_code = mutation_product.product_code','left');
		$this->db->where('mutation.mutation_code',$mutation_code);
		$this->db->order_by('mutation.date','desc');
		return $this->db->get()->result();
	}
}

?>