<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Typesrooms_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}
	public function list_typesrooms($search,$start=FALSE,$show_by=FALSE){
		$this->db->like('name_tr',$search);
		if ($start !== FALSE && $show_by !== FALSE) {
			$this->db->limit($show_by,$start);
		}
		$this->db->order_by('id','DESC');
		$query=$this->db->get('types_rooms');
		$amenities=$query->result();
		return $amenities;		
	}


	public function add($data){
		$_data=array('name_tr'=>$data['name_tr'],'description_tr'=>$data['description_tr'],'maxcap_tr'=>$data['maxcap_tr'],'price_tr'=>$data['price_tr']);
		$this->db->insert('types_rooms',$_data);
		$typeroom_id=$this->db->insert_id();
		$_data2;
		foreach ($data['amenities'] as $amenity) {
			$_data2[]=array('amenity_id'=>$amenity,'typeroom_id'=>$typeroom_id);
		}
		$this->db->insert_batch('detail_tram', $_data2);
	}

	public function show_type_room($id){
		$this->db->where('id',$id);
		$query=$this->db->get('types_rooms');
		$type_room=$query->row();
		return $type_room;
	}

	public function list_tram($id){
		$amenities=[];
		$this->db->where('typeroom_id',$id);
		$query=$this->db->get('detail_tram');
		$result=$query->result();
		$authors=[];
		foreach ($result as $detail_tram) {
			array_push($amenities,$detail_tram->amenity_id);
		}
		return $amenities;
	}

	public function update_type_room($id,$data){
		$_data=array('name_tr'=>$data['name_tr'],'description_tr'=>$data['description_tr'],'maxcap_tr'=>$data['maxcap_tr'],'price_tr'=>$data['price_tr'],'state_tr'=>$data['state_tr']);
		$this->db->where('id',$id);
		$this->db->update('types_rooms',$_data);
		foreach ($data['amenities'] as $amenity) {	
			if (!in_array($amenity,$data['list_detail_tram'])) {
				$_data2=array('amenity_id'=>$amenity,'typeroom_id'=>$id);
				$this->db->insert('detail_tram',$_data2);
			}
		}
		foreach ($data['list_detail_tram'] as $origen_amenity) {	
			if (!in_array($origen_amenity,$data['amenities'])) {
				$this->db->where(array('typeroom_id'=>$id,'amenity_id'=>$origen_amenity));
   				$this->db->delete('detail_tram');
			}
		}
	}
	public function delete_type_room($id){
   		$this->db->where(array('id'=>$id));
   		$this->db->delete('types_rooms');
   		
   }
}