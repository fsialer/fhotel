<div class="container">
	<div class="col-md-6 center-block panel panel-success quitar-float">
		<div class="text-center">
			<h2>Agregar Tipo Habitación</h2>
		</div>
		<div class="panel-body">
			<?php echo form_open(base_url().'admin/typesrooms/create');?>
			<div class="form-group">
				<label>Tipo Habitación</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'nom_th','value'=>set_value('nom_th'),'placeholder'=>'Nombre del tipo de habitación'));?>
				<?php echo form_error('nom_th', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Descripción</label>
				<?php echo form_textarea('desc_th',set_value('desc_th'),array('class'=>'form-control','placeholder'=>'Descripción del tipo de habitación'));?>
				<?php echo form_error('desc_th', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Amenidades</label>
				<?php echo form_multiselect('amenidades[]',$list_amenities,set_value('amenidades'),array('class'=>'form-control amenidades-select'));?>
				<?php echo form_error('amenidades[]', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Capacidad máxima</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'capmax_th','value'=>set_value('capmax_th'),'placeholder'=>'Capacidad máxima del tipo de habitacion','type'=>'number'));?>
				<?php echo form_error('capmax_th', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>	
			<div class="form-group">
				<label>Precio</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'prec_th','value'=>set_value('prec_th'),'placeholder'=>'Precio del tipo de habitacion'));?>
				<?php echo form_error('prec_th', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>					
			<div class="form-group texto-derecha">
				<?php echo form_submit('btnGuardar','Guardar',array('class'=>'btn btn-success'));?>
				<a href="<?php echo base_url().'admin/typesrooms'?>" class="btn btn-default">Cancelar</a>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>