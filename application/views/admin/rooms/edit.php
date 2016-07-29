<div class="container">
	<div class="col-md-6 center-block panel panel-success quitar-float">
		<div class="text-center">
			<h2>Editar Habitación - <?php echo $room->number_r;?></h2>
		</div>
		<div class="panel-body">
			<?php echo form_open(base_url().'admin/rooms/edit/'.$room->id);?>
			<div class="form-group">
				<label>Tipo Habitación</label>
				<?php echo form_dropdown('tip_habs',$list_typesrooms,set_value('tip_habs',$room->typeroom_id),array('class'=>'form-control tip_habs-select'));?>
				<?php echo form_error('tip_habs', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Número</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'num_h','value'=>set_value('num_h',$room->number_r),'placeholder'=>'Número de la habitación'));?>
				<?php echo form_error('num_h', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>	
			<div class="form-group">
				<label>Estado</label>
				<?php echo form_dropdown('estado_h',array('','Disponible'=>'Disponible','Inactivo'=>'Inactivo'),set_value('estado_h',$room->state_r),array('class'=>'form-control estado-select'));?>
				<?php echo form_error('estado_h', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>	
			<div class="form-group texto-derecha">
				<?php echo form_submit('btnEditar','Editar',array('class'=>'btn btn-warning'));?>
				<a href="<?php echo base_url().'admin/rooms'?>" class="btn btn-default">Cancelar</a>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>