<div class="container">
	<div class="col-md-6 center-block panel panel-success quitar-float">
		<div class="text-center">
			<h2>Asignar habitaciones</h2>
		</div>
		<div class="panel-body">
			<?php echo form_open(base_url().'admin/rooms/assign/'.$reservation->id);?>
			<div class="form-group">
				<label>Reservacion</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'reser_id','value'=>set_value('reser_id',$reservation->id),'readOnly'=>TRUE));?>
				<?php echo form_input(array('class'=>'form-control','name'=>'typeroom_id','value'=>set_value('typeroom_id',$reservation->typeroom_id),'type'=>'hidden'));?>
				<?php echo form_error('reser_id', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Tipo de habitacion</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'nom_th','value'=>set_value('nom_th',$reservation->name_tr),'readOnly'=>TRUE));?>
				<?php echo form_input(array('class'=>'form-control cantidad_h','name'=>'cantidad_h','value'=>set_value('cantidad_h',$reservation->quantity_dtrr),'type'=>'hidden'));?>
				<?php echo form_error('nom_th', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Habitaciones</label>
				<?php echo form_multiselect('habitaciones[]',$list_rooms,set_value('habitaciones'),array('class'=>'form-control habitaciones2-select'));?>
				<?php echo form_error('habitaciones[]', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>
			<div class="form-group texto-derecha">
				<?php echo form_submit('btnGuardar','Guardar',array('class'=>'btn btn-success'));?>
				<a href="<?php echo base_url().'admin/rooms/give'?>" class="btn btn-default">Cancelar</a>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>