<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Reservations_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}
	
	public function add($data){
		$data_re=$data['reserva'];
		$data_detre=$data['detalle_reserva'];
		$re=array('datestart_re'=>$data_re['f_inicio'],'dateend_re'=>$data_re['f_final']);
		$this->db->insert('reservations',$re);
		$reserva_id=$this->db->insert_id();
		$stay=array('reservation_id'=>$reserva_id,'user_id'=>$data['user_id'],'quantity_stay'=>$data_re['estancia']);
		$this->db->insert('stays',$stay);
		$detre;
		foreach ($data_detre as $data_dt) {
			$detre[]=array('quantity_dtrr'=>$data_dt['quantity'],'typeroom_id'=>$data_dt['typeroom_id'],'reservation_id'=>$reserva_id);
		}
		$this->db->insert_batch('detail_trre', $detre);
		
	}

	public function list_available($data){
		$this->db->select("types_rooms.id,types_rooms.name_tr,types_rooms.description_tr,types_rooms.maxcap_tr,types_rooms.price_tr,
			count(rooms.id) as total_rooms,IFNULL(count(rooms.id)-(select sum(detail_trre.quantity_dtrr) from detail_trre
			inner join reservations on detail_trre.reservation_id=reservations.id where 
			detail_trre.typeroom_id=types_rooms.id and detail_trre.reservation_id=reservations.id and 
			reservations.datestart_re='".$data['datestart_re']."' and reservations.dateend_re='".$data['dateend_re']."'),count(rooms.id)) as available");
		$this->db->join('rooms','types_rooms.id=rooms.typeroom_id','inner');
		$this->db->group_by('types_rooms.name_tr');
		$query=$this->db->get('types_rooms');
		$result=$query->result();
		return $result;
	}
	
	
	
}