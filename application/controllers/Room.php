<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Rooms_model');
		$this->load->model('Dropdown_model');
	}

	public function index($numpag=FALSE){
		$show_by=5;
		$start=0;
		$search="";
		if ($this->session->userdata("quantity")) {
			$show_by=$this->session->userdata("quantity");
		}
		if ($this->session->userdata("search")) {
			$search=$this->session->userdata('search');
		}
		if ($numpag) {
			$start=($numpag-1)*$show_by;
		}
		$config=array('base_url'=>base_url().'admin/rooms/',
				'total_rows'=>count($this->Rooms_model->list_rooms($search)), 'per_page'=>$show_by,'uri_segment'=>3,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>','use_page_numbers'=>TRUE
			);
		$this->pagination->initialize($config);
		$rooms=$this->Rooms_model->list_rooms($search,$start,$show_by);
		$data_template=array('title'=>'Listado de Habitaciones',
			'content'=>'admin/rooms/index',
			'rooms'=>$rooms);			
		$this->load->view('admin/templates/main',$data_template);
	}
	public function search(){		
		$this->session->set_userdata('search',$this->input->post('search'));
		redirect(base_url()."admin/rooms");		
	}
	public function show(){
		$this->session->unset_userdata('search');
		redirect(base_url()."admin/rooms");
	}

	public function show_by(){
		$this->session->set_userdata("quantity",$this->input->post("quantity"));
	}

	public function create(){
		if ($this->input->post()){
			if ($this->form_validation->run()==true) {
				$data=array('typeroom_id'=>$this->input->post('tip_habs'),'number_r'=>$this->input->post('num_h'));
				$this->Rooms_model->add($data);
				$this->session->set_flashdata(array('msg'=>'La Habitación <strong>'.$this->input->post('num_h').'</strong> se agrego con exito.!','alert'=>'alert alert-success'));
				redirect(base_url().'admin/rooms');
			}else{
				$list_typesrooms=$this->Dropdown_model->fill_dropdown('types_rooms','id,name_tr',array('state_tr'=>'Activo'));
				$data_template=array(
				'content'=>'admin/rooms/create',
				'title'=>'Agregar Habitación',
				'list_typesrooms'=>$list_typesrooms);
				$this->load->view('admin/templates/main',$data_template);
			}
		}else{
			$list_typesrooms=$this->Dropdown_model->fill_dropdown('types_rooms','id,name_tr',array('state_tr'=>'Activo'));
			$data_template=array(
				'content'=>'admin/rooms/create',
				'title'=>'Agregar Habitación',
				'list_typesrooms'=>$list_typesrooms);
			$this->load->view('admin/templates/main',$data_template);
		}
	}

	public function edit($id){
		if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('typeroom_id'=>$this->input->post('tip_habs'),'number_r'=>$this->input->post('num_h'),'state_r'=>$this->input->post('estado_h'));
				$this->Rooms_model->update_room($id,$data);
				$this->session->set_flashdata(array('msg'=>'La Habitación <strong>'.$this->input->post('num_h').'</strong> se edito con exito.!','alert'=>'alert alert-warning'));
				redirect(base_url().'admin/rooms');
			}else{	
				$list_typesrooms=$this->Dropdown_model->fill_dropdown('types_rooms','id,name_tr',array('state_tr'=>'Activo'));			
				$room=$this->Rooms_model->show_room($id);
				$data_template=array('title'=>'Editar Habitación',
					'content'=>'admin/rooms/edit',
					'room'=>$room,
				'list_typesrooms'=>$list_typesrooms);			
				$this->load->view('admin/templates/main',$data_template);
				}
		}else{
			$list_typesrooms=$this->Dropdown_model->fill_dropdown('types_rooms','id,name_tr',array('state_tr'=>'Activo'));
			$room=$this->Rooms_model->show_room($id);
			$data_template=array('title'=>'Editar Habitación',
					'content'=>'admin/rooms/edit',
					'room'=>$room,
				'list_typesrooms'=>$list_typesrooms);			
			$this->load->view('admin/templates/main',$data_template);
		}
	}

	public function delete($id){
		$this->Rooms_model->delete_room($id);
		$this->session->set_flashdata(array('msg'=>'La Habitación se elimino con exito.!','alert'=>'alert alert-danger'));
		redirect(base_url().'admin/rooms');

	}
}
