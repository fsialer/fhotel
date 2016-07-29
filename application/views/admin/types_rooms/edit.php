<div class="container">
	<div class="col-md-6 center-block panel panel-success quitar-float">
		<div class="text-center">
			<h2>Editar Tipo Habitación - <?php echo $type_room->name_tr;?></h2>
		</div>
		<div class="panel-body">
			<?php echo form_open(base_url().'admin/typesrooms/edit/'.$type_room->id);?>
			<div class="form-group">
				<label>Tipo Habitación</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'nom_th','value'=>set_value('nom_th',$type_room->name_tr),'placeholder'=>'Nombre del tipo de habitación'));?>
				<?php echo form_error('nom_th', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Descripción</label>
				<?php echo form_textarea('desc_th',set_value('desc_th',$type_room->description_tr),array('class'=>'form-control','placeholder'=>'Descripción del tipo de habitación'));?>
				<?php echo form_error('desc_th', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Amenidades</label>
				<?php echo form_multiselect('amenidades[]',$list_amenities,set_value('amenidades',$list_detail_tram),array('class'=>'form-control amenidades-select'));?>
				<?php echo form_error('amenidades[]', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Capacidad máxima</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'capmax_th','value'=>set_value('capmax_th',$type_room->maxcap_tr),'placeholder'=>'Capacidad máxima del tipo de habitacion','type'=>'number'));?>
				<?php echo form_error('capmax_th', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>	
			<div class="form-group">
				<label>Precio</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'prec_th','value'=>set_value('prec_th',$type_room->price_tr),'placeholder'=>'Precio del tipo de habitacion'));?>
				<?php echo form_error('prec_th', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>	
			<div class="form-group">
				<label>Estado</label>
				<?php echo form_dropdown('estado_th',array('','Activo'=>'Activo','Inactivo'=>'Inactivo'),set_value('estado_th',$type_room->state_tr),array('class'=>'form-control estado-select'));?>
				<?php echo form_error('estado_th', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>				
			<div class="form-group texto-derecha">
				<?php echo form_submit('btnEditar','Editar',array('class'=>'btn btn-warning'));?>
				<a href="<?php echo base_url().'admin/typesrooms'?>" class="btn btn-default">Cancelar</a>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>