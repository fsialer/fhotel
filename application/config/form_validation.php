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
);