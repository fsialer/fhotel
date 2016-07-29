<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_room extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Typesrooms_model');
		$this->load->model('Dropdown_model');
	}

	public function index($numpag=FALSE){
		$show_by=5;
		$start=0;
		$search="";
		if ($this->session->userdata("quantity")) {
			$show_by =  $this->session->userdata("quantity");
		}
		if ($this->session->userdata("search")) {
			$search=$this->session->userdata('search');
		}
		if ($numpag) {
			$start=($numpag-1)*$show_by;
		}
		$config=array('base_url'=>base_url().'admin/typesrooms/',
				'total_rows'=>count($this->Typesrooms_model->list_typesrooms($search)), 'per_page'=>$show_by,'uri_segment'=>3,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>','use_page_numbers'=>TRUE
			);
		$this->pagination->initialize($config);
		$types_rooms=$this->Typesrooms_model->list_typesrooms($search,$start,$show_by);
		$data_template=array('title'=>'Listado de Tipo de Habitación',
			'content'=>'admin/types_rooms/index',
			'types_rooms'=>$types_rooms);			
		$this->load->view('admin/templates/main',$data_template);
	}
	public function search(){		
		$this->session->set_userdata('search',$this->input->post('search'));
		redirect(base_url()."admin/typesrooms");		
	}
	public function show(){
		$this->session->unset_userdata('search');
		redirect(base_url()."admin/typesrooms");
	}

	public function show_by(){
		$this->session->set_userdata("quantity",$this->input->post("quantity"));
	}

	public function create(){
		if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('name_tr'=>$this->input->post('nom_th'),'description_tr'=>$this->input->post('desc_th'),'amenities'=>$this->input->post('amenidades'),'maxcap_tr'=>$this->input->post('capmax_th'),'price_tr'=>$this->input->post('prec_th'));
				$this->Typesrooms_model->add($data);
				$this->session->set_flashdata(array('msg'=>'La <strong>'.$this->input->post('nom_th').'</strong> se agrego con exito.!','alert'=>'alert alert-success'));
				redirect(base_url().'admin/typesrooms');
			}else{
				$list_amenities=$this->Dropdown_model->fill_dropdown('amenities','id,name_am',array('state_am'=>'Activo'));
				$data_template=array(
					'content'=>'admin/types_rooms/create',
					'title'=>'Agregar Tipo de Habitación',
					'list_amenities'=>$list_amenities);
				$this->load->view('admin/templates/main',$data_template);
			}
		}else{
			$list_amenities=$this->Dropdown_model->fill_dropdown('amenities','id,name_am',array('state_am'=>'Activo'));
			$data_template=array(
				'content'=>'admin/types_rooms/create',
				'title'=>'Agregar Tipo de Habitación',
				'list_amenities'=>$list_amenities);
			$this->load->view('admin/templates/main',$data_template);
		}
	}

	public function edit($id){
		if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$list_detail_tram=$this->Typesrooms_model->list_tram($id);
				$data=array('name_tr'=>$this->input->post('nom_th'),'description_tr'=>$this->input->post('desc_th'),'amenities'=>$this->input->post('amenidades'),'maxcap_tr'=>$this->input->post('capmax_th'),'price_tr'=>$this->input->post('prec_th'),'state_tr'=>$this->input->post('estado_th'),'list_detail_tram'=>$list_detail_tram);		
				$this->Typesrooms_model->update_type_room($id,$data);
				$this->session->set_flashdata(array('msg'=>'La <strong>'.$this->input->post('nom_th').'</strong> se edito con exito.!','alert'=>'alert alert-warning'));
				redirect(base_url().'admin/typesrooms');				
			}else{
				$type_room=$this->Typesrooms_model->show_type_room($id);
				$list_amenities=$this->Dropdown_model->fill_dropdown('amenities','id,name_am',array('state_am'=>'Activo'));
				$list_detail_tram=$this->Typesrooms_model->list_tram($id);
				$data_template=array(
					'content'=>'admin/types_rooms/edit',
					'title'=>'Editar Tipo de Habitación',
					'list_amenities'=>$list_amenities,
					'type_room'=>$type_room,
				'list_detail_tram'=>$list_detail_tram);
				$this->load->view('admin/templates/main',$data_template);
			}
		}else{
			$type_room=$this->Typesrooms_model->show_type_room($id);
			$list_amenities=$this->Dropdown_model->fill_dropdown('amenities','id,name_am',array('state_am'=>'Activo'));
			$list_detail_tram=$this->Typesrooms_model->list_tram($id);
			$data_template=array(
				'content'=>'admin/types_rooms/edit',
				'title'=>'Editar Tipo de Habitación',
				'list_amenities'=>$list_amenities,
				'type_room'=>$type_room,
				'list_detail_tram'=>$list_detail_tram);
			$this->load->view('admin/templates/main',$data_template);
		}
	}

	public function delete($id){
		$this->Typesrooms_model->delete_type_room($id);
		$this->session->set_flashdata(array('msg'=>'El Tipo habitación se elimino con exito.!','alert'=>'alert alert-danger'));
		redirect(base_url().'admin/typesrooms');

	}
}