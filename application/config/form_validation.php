<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config=array(
	'Amenity/create'=>array(
		array(
			'field'=>'nom_am',
			'label'=>'nom_am',
			'rules'=>'required|max_length[80]|is_unique[amenities.name_am]',
			'errors'=>array(
				'required'=>'La amenidad es requerido.',
				'max_length'=>'El nombre de la amenidad excedio su capacidad máxima',
				'is_unique'=>'La amenidad ya existe.'
				)
			)

	),
	'Amenity/edit'=>array(
		array(
			'field'=>'nom_am',
			'label'=>'nom_am',
			'rules'=>'required|max_length[80]',
			'errors'=>array(
				'required'=>'La amenidad es requerido.',
				'max_length'=>'El nombre de la amenidad excedio su capacidad máxima'
				)
			),
		array(
			'field'=>'estado_am',
			'label'=>'estado_am',
			'rules'=>'in_list[Activo,Inactivo]',
			'errors'=>array(
				'in_list'=>'El estado de la amenidad es requerido.'
				)
			)

	),
	'Type_room/create'=>array(
		array(
			'field'=>'nom_th',
			'label'=>'nom_th',
			'rules'=>'required|max_length[80]|is_unique[types_rooms.name_tr]',
			'errors'=>array(
				'required'=>'El tipo de habitación es requerido.',
				'max_length'=>'El nombre del tipo de habitación excedio su capacidad máxima',
				'is_unique'=>'El tipo de habitación ya existe.'
				)
			),
		array(
			'field'=>'desc_th',
			'label'=>'desc_th',
			'rules'=>'required|max_length[150]',
			'errors'=>array(
				'required'=>'La descripción del tipo de habitación es requerido.',
				'max_length'=>'La descripción del tipo de habitación excedio su capacidad máxima'
				)
			),
		array(
			'field'=>'amenidades[]',
			'label'=>'amenidades[]',
			'rules'=>'required',
			'errors'=>array(
				'required'=>'Las amenidades son requeridas.'
				)
			),
		array(
			'field'=>'capmax_th',
			'label'=>'capmax_th',
			'rules'=>'required|is_natural_no_zero',
			'errors'=>array(
				'required'=>'La capacidad maxima del tipo de habitación es requerido.',
				'is_natural_no_zero'=>'No esta permitido este tipo de valor'
				)
			),
		array(
			'field'=>'prec_th',
			'label'=>'prec_th',
			'rules'=>'required|is_natural_no_zero',
			'errors'=>array(
				'required'=>'El precio del tipo de habitación es requerido.',
				'is_natural_no_zero'=>'No esta permitido este tipo de valor'
				)
			),
	),
	'Type_room/edit'=>array(
		array(
			'field'=>'nom_th',
			'label'=>'nom_th',
			'rules'=>'required|max_length[80]',
			'errors'=>array(
				'required'=>'El tipo de habitación es requerido.',
				'max_length'=>'El nombre del tipo de habitación excedio su capacidad máxima'
				)
			),
		array(
			'field'=>'desc_th',
			'label'=>'desc_th',
			'rules'=>'required|max_length[150]',
			'errors'=>array(
				'required'=>'La descripción del tipo de habitación es requerido.',
				'max_length'=>'La descripción del tipo de habitación excedio su capacidad máxima'
				)
			),
		array(
			'field'=>'amenidades[]',
			'label'=>'amenidades[]',
			'rules'=>'required',
			'errors'=>array(
				'required'=>'Las amenidades son requeridas.'
				)
			),
		array(
			'field'=>'capmax_th',
			'label'=>'capmax_th',
			'rules'=>'required|is_natural_no_zero',
			'errors'=>array(
				'required'=>'La capacidad maxima del tipo de habitación es requerido.',
				'is_natural_no_zero'=>'No esta permitido este tipo de valor'
				)
			),
		array(
			'field'=>'prec_th',
			'label'=>'prec_th',
			'rules'=>'required|is_natural_no_zero',
			'errors'=>array(
				'required'=>'El precio del tipo de habitación es requerido.',
				'is_natural_no_zero'=>'No esta permitido este tipo de valor'
				)
			),
		array(
			'field'=>'estado_th',
			'label'=>'estado_th',
			'rules'=>'in_list[Activo,Inactivo]',
			'errors'=>array(
				'in_list'=>'El estado del tipo habitación es requerido.'
				)
			)
	),
	'Room/create'=>array(
		array(
			'field'=>'tip_habs',
			'label'=>'tip_habs',
			'rules'=>'is_natural_no_zero',
			'errors'=>array(
				'is_natural_no_zero'=>'El Tipo de habitación es requerido.'
				)
			),
		array(
			'field'=>'num_h',
			'label'=>'num_h',
			'rules'=>'required',
			'errors'=>array(
				'required'=>'El número de habitación es requerido.'
				)
			),


	),
	'Room/edit'=>array(
		array(
			'field'=>'tip_habs',
			'label'=>'tip_habs',
			'rules'=>'is_natural_no_zero',
			'errors'=>array(
				'is_natural_no_zero'=>'El Tipo de habitación es requerido.'
				)
			),
		array(
			'field'=>'num_h',
			'label'=>'num_h',
			'rules'=>'required',
			'errors'=>array(
				'required'=>'El número de habitación es requerido.'
				)
			),
		array(
			'field'=>'estado_h',
			'label'=>'estado_h',
			'rules'=>'in_list[Disponible,Inactivo]',
			'errors'=>array(
				'in_list'=>'El estado del habitación es requerido.'
				)
			)
	),
	'Front/reservation'=>array(
		array(
			'field'=>'finicio_re',
			'label'=>'finicio_re',
			'rules'=>'required',
			'errors'=>array(
				'required'=>'La fecha de inicio es requerido.'
				)
			),
		array(
			'field'=>'ffin_re',
			'label'=>'ffin_re',
			'rules'=>'required',
			'errors'=>array(
				'required'=>'La fecha de fin es requerido.'
				)
			),

	),
	'Front/shopping_cart'=>array(
		array(
			'field'=>'quantity',
			'label'=>'quantity',
			'rules'=>'required|numeric|is_natural_no_zero',
			'errors'=>array(
				'required'=>'La cantidad de habitaciones es requerida.',
				'numeric'=>'Tienes que ser de tipi numérico',
				'is_natural_no_zero'=>'Tiene que ser mayor a cero'
				)
			)
	),
	'User/register'=>array(
		array(
			'field'=>'nom_us',
			'label'=>'nom_us',
			'rules'=>'required|max_length[80]',
			'errors'=>array(
				'required'=>'El nombre del usuario es requerida.',
				'max_length'=>'El nombre del usuario se excedio de su capacidad'
				)
			),
		array(
			'field'=>'ape_us',
			'label'=>'ape_us',
			'rules'=>'required|max_length[80]',
			'errors'=>array(
				'required'=>'El apellido del usuario es requerida.',
				'max_length'=>'El apellido del usuario se excedio de su capacidad'
				)
			),
		array(
			'field'=>'doc_us',
			'label'=>'doc_us',
			'rules'=>'required|max_length[20]|is_unique[users.document_us]',
			'errors'=>array(
				'required'=>'El documento del usuario es requerida.',
				'max_length'=>'El documento del usuario se excedio de su capacidad',
				'is_unique'=>'El documento ya esta siendo usado'
				)
			),
		array(
			'field'=>'dir_us',
			'label'=>'dir_us',
			'rules'=>'required|max_length[80]',
			'errors'=>array(
				'required'=>'El nombre del usuario es requerida.',
				'max_length'=>'El nombre del usuario se excedio de su capacidad'
				)
			),
		array(
			'field'=>'email_us',
			'label'=>'email_us',
			'rules'=>'required|max_length[50]|is_unique[users.email_us]|valid_email',
			'errors'=>array(
				'required'=>'El email del usuario es requerida.',
				'max_length'=>'El email del usuario se excedio de su capacidad',
				'is_unique'=>'El email ya esta siendo usado',
				'valid_email'=>'El email no es válido'
				)
			),
		array(
			'field'=>'telf_us',
			'label'=>'telf_us',
			'rules'=>'required|max_length[30]',
			'errors'=>array(
				'required'=>'El telefono del usuario es requerida.',
				'max_length'=>'El telefono del usuario se excedio de su capacidad',
				)
			),
		array(
			'field'=>'pass_us',
			'label'=>'pass_us',
			'rules'=>'required',
			'errors'=>array(
				'required'=>'El nombre del usuario es requerida.',
				'max_length'=>'El nombre del usuario se excedio de su capacidad'
				)
			),
		array(
			'field'=>'rpass_us',
			'label'=>'rpass_us',
			'rules'=>'required|matches[pass_us]',
			'errors'=>array('required'=>'La repeticion de la nueva contraseña es requerido.','matches'=>'La nueva contraseña no coincide')
			)
	),
	'User/auth'=>array(
		array(
			'field'=>'email_us',
			'label'=>'email_us',
			'rules'=>'required|max_length[50]|valid_email',
			'errors'=>array(
				'required'=>'El email del usuario es requerida.',
				'max_length'=>'El email del usuario se excedio de su capacidad',
				'valid_email'=>'El email no es válido'
				)
			),
		array(
			'field'=>'pass_us',
			'label'=>'pass_us',
			'rules'=>'required',
			'errors'=>array(
				'required'=>'El nombre del usuario es requerida.',
				'max_length'=>'El nombre del usuario se excedio de su capacidad'
				)
			),
		
	),

);