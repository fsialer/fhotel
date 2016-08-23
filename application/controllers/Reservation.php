<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Reservations_model');
		
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
		$config=array('base_url'=>base_url().'admin/reservations/',
				'total_rows'=>count($this->Reservations_model->list_reservations($search)), 'per_page'=>$show_by,'uri_segment'=>3,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>','use_page_numbers'=>TRUE
			);
		$this->pagination->initialize($config);
		$reservations=$this->Reservations_model->list_reservations($search,$start,$show_by);
		$data_template=array('title'=>'Listado de Reservaciones',
			'content'=>'admin/reservations/index',
			'reservations'=>$reservations);			
		$this->load->view('admin/templates/main',$data_template);
	}

	public function search(){		
		$this->session->set_userdata('search',$this->input->post('search'));
		redirect(base_url()."admin/reservations");		
	}
	public function show(){
		$this->session->unset_userdata('search');
		redirect(base_url()."admin/reservations");
	}

	public function show_by(){
		$this->session->set_userdata("quantity",$this->input->post("quantity"));
	}

	



}
