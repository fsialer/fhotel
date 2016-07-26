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
			'rules'=>'required',
			'errors'=>array(
				'required'=>'La estado de la amenidad es requerido.'
				)
			)

	),
);