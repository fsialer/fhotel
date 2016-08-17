<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_reservations extends CI_Migration
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
			'datestart_re'=>array(
				'type'=>'date'),
			'dateend_re'=>array(
				'type'=>'date'),
			'date_re'=>array(
				'type'=>'timestamp',
				'default'=>'current_timestamp'),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()'));
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('reservations',FALSE,$attributes);
	}
	public function down(){
		$this->dbforge->drop_table('reservations');
	}
}