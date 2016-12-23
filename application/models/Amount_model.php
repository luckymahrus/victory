<?php 
	
class Amount_model extends CI_Model{

	function get_outlet_amount($outlet_id = ''){
		$this->db->select('gold_amount.*, amount_limit.amount_limit as limit, outlets.name as outlet, amount_limit.id as limit_id');
		$this->db->from('gold_amount');
		$this->db->join('amount_limit', 'amount_limit.amount_id = gold_amount.id','left');
		$this->db->join('outlets', 'amount_limit.outlet_id = outlets.id','left');
		$this->db->where('amount_limit.outlet_id', $outlet_id);
		$this->db->order_by('amount_limit.outlet_id','asc');		
		return $this->db->get()->result();
	}

	
}

?>