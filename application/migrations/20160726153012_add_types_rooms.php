<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_types_rooms extends CI_Migration
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
			'name_tr'=>array(
				'type'=>'varchar',
				'constraint'=>80,
				'unique'=>TRUE),
			'description_tr'=>array(
				'type'=>'text'),
			'maxcap_tr'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'price_tr'=>array(
				'type'=>'double'),
			'state_am'=>array(
				'type'=>'enum',
				'constraint'=>array('Activo','Inactivo'),
				'default'=>'Activo'),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()'
			));
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('types_rooms',FALSE,$attributes);
	}
	public function down(){
		$this->dbforge->drop_table('types_rooms');
	}
}