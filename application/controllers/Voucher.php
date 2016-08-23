<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Reservations_model');
		$this->load->model('Vouchers_model');
	}

	public function create($id){
		if ($this->input->post()) {
			$data=array('date_v'=>$this->input->post('fecha_v'),'reservation_id'=>$this->input->post('reser_id'),'igvtotal_v'=>$this->input->post('igv_total'),'total_v'=>$this->input->post('ttotal'));
			$this->Vouchers_model->add($data);
			$this->session->set_flashdata(array('msg'=>'La reserva del usuario'.$this->input->post('datos_hu').'</strong> se pago con exito.!','alert'=>'alert alert-success'));
			redirect(base_url().'admin/reservations');
		}else{
			$reservation=$this->Reservations_model->list_reservation_pay($id);
			$data_template=array(
				'content'=>'admin/vouchers/create',
				'title'=>'Comprobante de Pago',
				'reservation'=>$reservation);
			$this->load->view('admin/templates/main',$data_template);
		}
	}
}