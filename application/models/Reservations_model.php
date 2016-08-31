<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Reservations_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}

	public function list_reservations($search,$start=FALSE,$show_by=FALSE){
		$this->db->select("users.name_us,users.surname_us,users.document_us,reservations.id,reservations.datestart_re,reservations.dateend_re");
		$this->db->like('users.document_us',$search);
		if ($start !== FALSE && $show_by !== FALSE) {
			$this->db->limit($show_by,$start);
		}
		$this->db->join('stays','reservations.id=stays.reservation_id','inner');
		$this->db->join('users','stays.user_id=users.id','inner');
		$this->db->where(array('reservations.state_re'=>'Reservado'));
		$this->db->order_by('reservations.id','DESC');
		$query=$this->db->get('reservations');
		$reservations=$query->result();
		return $reservations;	

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
			$detre[]=array('quantity_dtrr'=>$data_dt['quantity'],'typeroom_id'=>$data_dt['typeroom_id'],'reservation_id'=>$reserva_id,'subtotal_dtrr'=>$data_dt['subtotal']);
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

	public function list_reservation_pay($data){
		$this->db->select("users.name_us,users.surname_us,users.document_us,reservations.id,reservations.datestart_re,reservations.dateend_re,stays.quantity_stay");
		$this->db->where(array('reservations.id'=>$data));
		$this->db->join('stays','reservations.id=stays.reservation_id','inner');
		$this->db->join('users','stays.user_id=users.id','inner');
		$this->db->where(array('reservations.state_re'=>'Reservado'));
		$query=$this->db->get('reservations');
		$reservation=$query->row();
		$this->db->select("types_rooms.name_tr,types_rooms.price_tr,detail_trre.quantity_dtrr,detail_trre.subtotal_dtrr");
		$this->db->where(array('detail_trre.reservation_id'=>$data));
		$this->db->join('types_rooms','detail_trre.typeroom_id=types_rooms.id','inner');		
		$query=$this->db->get('detail_trre');
		$detalle_reserva=$query->result();
		$array_data=array('reserva'=>$reservation,'detalle'=>$detalle_reserva);
		return $array_data;
			
	}

	public function list_rooms_give($search,$start=FALSE,$show_by=FALSE){
   		$this->db->select("users.name_us,users.surname_us,users.document_us,reservations.id,reservations.datestart_re,reservations.dateend_re,types_rooms.name_tr,detail_trre.typeroom_id,detail_trre.quantity_dtrr,detail_trre.id as detail_trre_id");
		$this->db->like('users.document_us',$search);
		if ($start !== FALSE && $show_by !== FALSE) {
			$this->db->limit($show_by,$start);
		}
		$this->db->where(array('reservations.state_re'=>'Pagado','detail_trre.state_dtrr'=>'Pendiente'));
		$this->db->join('stays','reservations.id=stays.reservation_id','inner');
		$this->db->join('users','stays.user_id=users.id','inner');
		$this->db->join('detail_trre','reservations.id=detail_trre.reservation_id','inner');
		$this->db->join('types_rooms','detail_trre.typeroom_id=types_rooms.id','inner');
		$query=$this->db->get('reservations');
		$rooms=$query->result();
		return $rooms;		
   }

   public function show_reservation($data){
   		$this->db->select("detail_trre.id,detail_trre.reservation_id,types_rooms.name_tr,detail_trre.typeroom_id,detail_trre.quantity_dtrr");
		$this->db->where(array('detail_trre.id'=>$data['detail_trre_id']));
		$this->db->join('types_rooms','detail_trre.typeroom_id=types_rooms.id','inner');
		$query=$this->db->get('detail_trre');
		$room=$query->row();
		return $room;
	}
	
	
	
}