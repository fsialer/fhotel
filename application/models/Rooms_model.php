<?php
class Rooms_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}

	public function list_rooms($search,$start=FALSE,$show_by=FALSE){
		$this->db->select("rooms.id,types_rooms.name_tr,rooms.number_r,rooms.state_r");
		$this->db->like('number_r',$search);
		if ($start !== FALSE && $show_by !== FALSE) {
			$this->db->limit($show_by,$start);
		}
		$this->db->order_by('rooms.id','DESC');
		$this->db->join('types_rooms','rooms.typeroom_id=types_rooms.id','inner');
		$query=$this->db->get('rooms');
		$rooms=$query->result();
		return $rooms;		
	}

	public function add($data){
		$this->db->insert('rooms',$data);
	}

	public function show_room($id){
		$this->db->where('id',$id);
		$query=$this->db->get('rooms');
		$room=$query->row();
		return $room;
	}
	public function update_room($id,$data){
		$this->db->where('id',$id);
		$this->db->update('rooms',$data);
	}

	public function delete_room($id){
   		$this->db->where(array('id'=>$id));
   		$this->db->delete('rooms');   		
   }

   public function add_room_asign($data){
   		foreach ($data['room_id'] as $room) {
   			$data_new=array('detail_trre_id'=>$data['detail_trre_id'],'room_id'=>$room);
   			$this->db->insert('detail_asig_rooms',$data_new);
   		}
   		$this->db->set('detail_trre.state_dtrr','Asignado');
   		$this->db->where(array('detail_trre.id'=>$data['detail_trre_id']));
   		$this->db->update('detail_trre');

   		foreach ($data['room_id'] as $room) {
	   		$this->db->set('rooms.state_r','Ocupado');
	   		$this->db->where(array('rooms.id'=>$room));
	   		$this->db->update('rooms');
   		}
   }

  




}