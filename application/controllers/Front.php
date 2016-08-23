<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Reservations_model');
		$this->load->model('Amenities_model');
	}

	public function reservation(){
		if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$this->session->unset_userdata('detail_reservate');
				$finicio_re=$this->input->post('finicio_re');				
				$date = str_replace('/', '-', $finicio_re);
				$finicio_re=date("Y-m-d",strtotime($date));				
				$ffin_re=$this->input->post('ffin_re');				
				$date = str_replace('/', '-', $ffin_re);
				$ffin_re=date("Y-m-d", strtotime($date));
				$data=array('datestart_re'=>$finicio_re,'dateend_re'=>$ffin_re);
				$this->session->set_userdata('reserva',array('f_inicio'=>$finicio_re,
					'f_final'=>$ffin_re,'estancia'=>$this->input->post('estancia')));
				$types_rooms=$this->Reservations_model->list_available($data);
				$list_amenities=$this->Amenities_model->filter_amenities();
				$data_template=array('title'=>'Reservaciones',
				'content'=>'front/reservations/create',
				'types_rooms'=>$types_rooms,
				'list_amenities'=>$list_amenities);			
				$this->load->view('front/templates/main',$data_template);
			}else{
				$data_template=array('title'=>'Reservaciones',
				'content'=>'front/reservations/create',
				'types_rooms'=>'',
				'list_amenities'=>'');			
				$this->load->view('front/templates/main',$data_template);	
			}
		}else{
			$data_template=array('title'=>'Reservaciones',
			'content'=>'front/reservations/create',
			'types_rooms'=>'',
			'list_amenities'=>'');			
			$this->load->view('front/templates/main',$data_template);
		}
		
	}

	public function shopping_cart(){
		if ($this->form_validation->run()==true) {
		if ($this->session->userdata('detail_reservate')) {
			$reserva=$this->session->userdata('detail_reservate');
			$reserva[$this->input->post('typeroom_id')]=array('quantity'=>$this->input->post('quantity'),'typeroom_id'=>$this->input->post('typeroom_id'),
				'typesrooms_name'=>$this->input->post('typesrooms_name'),'typesrooms_price'=>$this->input->post('typesrooms_price'),'subtotal'=>$this->input->post('quantity')*$this->input->post('typesrooms_price'));
			$this->session->set_userdata('detail_reservate',$reserva);
		}else{
			$reserva=array($this->input->post('typeroom_id')=>array('quantity'=>$this->input->post('quantity'),'typeroom_id'=>$this->input->post('typeroom_id'),
			'typesrooms_name'=>$this->input->post('typesrooms_name'),'typesrooms_price'=>$this->input->post('typesrooms_price'),'subtotal'=>$this->input->post('quantity')*$this->input->post('typesrooms_price')));
			$this->session->set_userdata('detail_reservate',$reserva);
		}		
			$this->load->view('front/reservations/cart');
		}else{
			$this->load->view('front/reservations/cart');
		}		
	}

	public function delete_tr(){
		$pos=$this->input->post('position');
		$reserva=$this->session->userdata('detail_reservate');
		unset($reserva[$pos]);
		$this->session->set_userdata('detail_reservate',$reserva);
		if (count($reserva)<1) {
			echo '<span class="glyphicon glyphicon-circle-arrow-down icon-grande"></span>
				<span class="glyphicon glyphicon-option-horizontal icon-grande"></span>
				<span class="glyphicon glyphicon-shopping-cart icon-grande"></span>
				<hr>
				<p>
						<h4>El carrito de compras esta vacio, agregue algún item</h4>
				</p>';
		}else{
			$this->load->view('front/reservations/cart');
		}
		
	}
		

}

