<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration
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
			'name_us'=>array(
				'type'=>'varchar',
				'constraint'=>80),
			'surname_us'=>array(
				'type'=>'varchar',
				'constraint'=>80),
			'document_us'=>array(
				'type'=>'varchar',
				'constraint'=>80,
				'unique'=>TRUE),
			'address_us'=>array(
				'type'=>'varchar',
				'constraint'=>80),
			'email_us'=>array(
				'type'=>'varchar',
				'constraint'=>80,
				'unique'=>TRUE),
			'phone_us'=>array(
				'type'=>'varchar',
				'constraint'=>80,
				'unique'=>TRUE),
			'pass_us'=>array(
				'type'=>'text'
				),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()'));
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('users',FALSE,$attributes);
	}
	public function down(){
		$this->dbforge->drop_table('users');
	}
}