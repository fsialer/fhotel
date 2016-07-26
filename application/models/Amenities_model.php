<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Amenities_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}
	public function list_amenities($search,$start=FALSE,$show_by=FALSE){
		$this->db->like('name_am',$search);
		if ($start !== FALSE && $show_by !== FALSE) {
			$this->db->limit($show_by,$start);
		}
		$this->db->order_by('id','DESC');
		$query=$this->db->get('amenities');
		$amenities=$query->result();
		return $amenities;
		
	}

	public function add($data){
		$this->db->insert('amenities',$data);
	}
	public function show_amenity($id){
		$this->db->where('id',$id);
		$query=$this->db->get('amenities');
		$author=$query->row();
		return $author;
	}
	public function update_amenity($id,$data){
		$this->db->where('id',$id);
		$this->db->update('amenities',$data);
	}

	public function delete_amenity($id){
   		$this->db->where(array('id'=>$id));
   		$this->db->delete('amenities');
   		
   }
	
}