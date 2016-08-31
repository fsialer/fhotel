<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_detail_asig_rooms extends CI_Migration
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
				'auto_increment'=>TRUE),
			'detail_trre_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'room_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()',
			'CONSTRAINT FOREIGN KEY (detail_trre_id) REFERENCES detail_trre(id) on delete cascade',
			'CONSTRAINT FOREIGN KEY (room_id) REFERENCES rooms(id) on delete cascade'
			));
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('detail_asig_rooms',FALSE,$attributes);
	}
	public function down(){
		$this->dbforge->drop_table('detail_asig_rooms');
	}
}