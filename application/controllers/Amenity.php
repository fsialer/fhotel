<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Amenity extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Amenities_model');
	}

	public function index($nropag=FALSE){
		$show_by=5;
		$start=0;
		$search="";
		if ($this->session->userdata("quantity")) {
			$show_by =  $this->session->userdata("quantity");
		}
		if ($this->session->userdata("search")) {
			$search=$this->session->userdata('search');
		}
		if ($nropag) {
			$start=($nropag-1)*$show_by;
		}
		$config=array('base_url'=>base_url().'admin/amenities/',
				'total_rows'=>count($this->Amenities_model->list_amenities($search)), 'per_page'=>$show_by,'uri_segment'=>3,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>','use_page_numbers'=>TRUE
			);
		$this->pagination->initialize($config);
		$amenities=$this->Amenities_model->list_amenities($search,$start,$show_by);
		$data_template=array('title'=>'Listado de Amenidades',
			'content'=>'admin/amenities/index',
			'amenities'=>$amenities);			
		$this->load->view('admin/templates/main',$data_template);
	}
	public function search(){		
		$this->session->set_userdata('search',$this->input->post('search'));
		redirect(base_url()."admin/amenities");		
	}
	public function show(){
		$this->session->unset_userdata('search');
		redirect(base_url()."admin/amenities");
	}

	public function show_by(){
		$this->session->set_userdata("quantity",$this->input->post("quantity"));
	}

	public function create(){
		if ($this->input->post()){
			if ($this->form_validation->run()==true) {
				$data=array('name_am'=>$this->input->post('nom_am'));
				$this->Amenities_model->add($data);
				$this->session->set_flashdata(array('msg'=>'La <strong>'.$this->input->post('nom_am').'</strong> se agrego con exito.!','alert'=>'alert alert-success'));
				redirect(base_url().'admin/amenities');
			}else{
				$data_template=array(
				'content'=>'admin/amenities/create',
				'title'=>'Agregar Amenidades');
				$this->load->view('admin/templates/main',$data_template);
			}
		}else{
			$data_template=array(
				'content'=>'admin/amenities/create',
				'title'=>'Agregar Amenidades');
			$this->load->view('admin/templates/main',$data_template);
		}
	}

	public function edit($id){
		if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('name_am'=>$this->input->post('nom_am'),'state_am'=>$this->input->post('estado_am'));
				$this->Amenities_model->update_amenity($id,$data);
				$this->session->set_flashdata(array('msg'=>'La <strong>'.$this->input->post('nom_am').'</strong> se edito con exito.!','alert'=>'alert alert-warning'));
				redirect(base_url().'admin/amenities');
			}else{				
				$amenity=$this->Amenities_model->show_amenity($id);
				$data_template=array('title'=>'Editar Amenidades',
					'content'=>'admin/amenities/edit',
					'amenity'=>$amenity);			
				$this->load->view('admin/templates/main',$data_template);
				}
		}else{
			$amenity=$this->Amenities_model->show_amenity($id);
				$data_template=array('title'=>'Editar Amenidades',
					'content'=>'admin/amenities/edit',
					'amenity'=>$amenity);			
				$this->load->view('admin/templates/main',$data_template);
		}
	}

	public function delete($id){
		$this->Amenities_model->delete_amenity($id);
		$this->session->set_flashdata(array('msg'=>'La amenidad se elimino con exito.!','alert'=>'alert alert-danger'));
		redirect(base_url().'admin/amenities');

	}
}
