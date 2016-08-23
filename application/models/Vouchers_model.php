<?php
class Vouchers_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}

	

	public function add($data){
		$this->db->insert('vouchers',$data);
		$this->db->where('reservations.id',$data['reservation_id']);
		$this->db->set('state_re','Pagado');
		$this->db->update('reservations');
	}
}