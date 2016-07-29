<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Dropdown_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}
	public function fill_dropdown($table,$data,$where=null){
		$this->db->select($data);
		if (!empty($where)) {
			$this->db->where($where);
		}		
		$query=$this->db->get($table);
		$result=$query->result();
		$fields=explode(',',$data);
		$list_ele=[];
		$list_ele[0]='';		
		foreach ($result as $element) {
			$list_ele[$element->$fields[0]]=$element->$fields[1];
		}
		return $list_ele;
	}

	
}