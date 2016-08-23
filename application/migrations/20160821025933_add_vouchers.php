<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_vouchers extends CI_Migration
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function up(){
		$this->dbforge->add_field(array(
			'id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE,
				'auto_increment'=>TUE),
			'date_v'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'reservation_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'igvtotal_v'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'total_v'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()',
			'CONSTRAINT FOREIGN KEY (reservation_id) REFERENCES reservations(id) on delete cascade',
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('vouchers',FALSE,$attributes);
	}
	public function down(){
		$this->dbforge->drop_table('vouchers');
	}
}