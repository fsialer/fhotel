<div class="container">
	<div class="col-md-6 center-block panel panel-success  quitar-float">
		<div class="text-center">
			<h2>Editar Amenidades - <?php echo $amenity->name_am;?></h2>
		</div>
		<div class="panel-body">
			<?php echo form_open(base_url().'admin/amenities/edit/'.$amenity->id);?>
			<div class="form-group">
				<label>Amenidad</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'nom_am','value'=>set_value('nom_am',$amenity->name_am),'placeholder'=>'Nombre de la amenidad'));?>
				<?php echo form_error('nom_am', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Estado</label>
				<?php echo form_dropdown('estado_am',array('','Activo'=>'Activo','Inactivo'=>'Inactivo'),set_value('estado_am',$amenity->state_am),array('class'=>'form-control estado-select'));?>
				<?php echo form_error('estado_am', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>
			<div class="form-group texto-derecha">
				<?php echo form_submit('btnEditar','Editar',array('class'=>'btn btn-warning'));?>
				<a href="<?php echo base_url().'admin/amenities'?>" class="btn btn-default">Cancelar</a>
			</div>
			<?php echo form_close();?>
		</div>		
	</div>	
</div>