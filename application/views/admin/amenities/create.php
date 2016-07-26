<div class="container">
	<div class="col-md-6 center-block panel panel-success  quitar-float">
		<div class="text-center">
			<h2>Agregar Amenidades</h2>
		</div>
		<div class="panel-body">
			<?php echo form_open(base_url().'admin/amenities/create');?>
			<div class="form-group">
				<label>Amenidad</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'nom_am','value'=>set_value('nom_am'),'placeholder'=>'Nombre de la amenidad'));?>
				<?php echo form_error('nom_am', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>
			<div class="form-group texto-derecha">
				<?php echo form_submit('btnGuardar','Guardar',array('class'=>'btn btn-success'));?>
				<a href="<?php echo base_url().'admin/amenities'?>" class="btn btn-default">Cancelar</a>
			</div>
			<?php echo form_close();?>
		</div>
		
	</div>
	
