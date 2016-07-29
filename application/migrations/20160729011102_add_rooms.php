<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_rooms extends CI_Migration
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
			'typeroom_id'=>array(
				'type'=>'varchar',
				'constraint'=>80,
				'unique'=>TRUE),
			'number_r'=>array(
				'type'=>'varchar',
				'constraint'=>50,
				'unique'=>TRUE),
			'state_r'=>array(
				'type'=>'enum',
				'constraint'=>array('Disponible','Mantenimiento','Inactivo'),
				'default'=>'Disponible'),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()',
			'CONSTRAINT FOREIGN KEY (typeroom_id) REFERENCES types_rooms(id) on delete cascade'
			));
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('rooms',FALSE,$attributes);
	}
	public function down(){
		$this->dbforge->drop_table('rooms');
	}
}