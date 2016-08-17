<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Users_model');
		$this->load->model('Reservations_model');
	}

	public function auth(){
		if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('email_us'=>$this->input->post("email_us"),'pass_us'=>do_hash($this->input->post('pass_us')));
				$user=$this->Users_model->auth_user($data);
				if (count($user)>0) {
					$data=array('reserva'=>$this->session->userdata('reserva'),'detalle_reserva'=>$this->session->userdata('detail_reservate'),'user_id'=>$user->id);
					$this->Reservations_model->add($data);
					$this->session->set_flashdata(array('msg'=>'La reservación se realizo con exito!!','alert'=>'alert alert-success'));
					redirect(base_url().'reservation');
				}else{
					$this->session->set_flashdata(array('msg'=>'El usuario ingresado no existe.','alert'=>'alert alert-danger'));
					redirect(base_url().'auth');
				}
			}else{
				$data_template=array('title'=>'Autenticar Usuario',
				'content'=>'front/users/login'
				);
				$this->load->view('front/templates/main',$data_template);
			}			
		}else{
			$data_template=array('title'=>'Autenticar Usuario',
				'content'=>'front/users/login'
				);
			$this->load->view('front/templates/main',$data_template);
		}
	}

	public function register(){		
		if ($this->input->post()){
			if ($this->form_validation->run()==true) {
				$data=array('name_us'=>$this->input->post("nom_us"),'surname_us'=>$this->input->post("ape_us"),
				'document_us'=>$this->input->post("doc_us"),'address_us'=>$this->input->post("dir_us"),
				'email_us'=>$this->input->post("email_us"),'phone_us'=>$this->input->post("telf_us"),
				'pass_us'=>do_hash($this->input->post('pass_us')));
				$this->Users_model->add($data);
				$this->session->set_flashdata(array('msg'=>'El registro del usuario <strong>'.$this->input->post("nom_us").' '.$this->input->post("ape_us").'</strong> fue exitoso.','alert'=>'alert alert-success'));
				redirect(base_url().'auth');
			}else{
				$data_template=array('title'=>'Formulario de registro',
				'content'=>'front/users/create'
				);
				$this->load->view('front/templates/main',$data_template);
			}			
		}else{
			$data_template=array('title'=>'Formulario de registro',
				'content'=>'front/users/create'
				);
			$this->load->view('front/templates/main',$data_template);
		}
		
	}
}