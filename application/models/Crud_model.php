<?php 
	
class Crud_model extends CI_Model{

	function insert_data($table,$data){
		$this->db->insert($table,$data);
	}

	function update_data($table,$data,$condition){
		$this->db->update($table,$data,$condition);
	}

	function get_data($table){
		return $this->db->get($table);
	}

	function get_by_condition($table,$condition){
		return $this->db->get_where($table,$condition);
	}

	function delete_data($table,$condition){
		$this->db->delete($table,$condition);
	}

	

}

?>