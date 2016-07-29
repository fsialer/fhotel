<div class="container">
	<div class="col-md-6 center-block panel panel-success quitar-float">
		<div class="text-center">
			<h2>Agregar Habitación</h2>
		</div>
		<div class="panel-body">
			<?php echo form_open(base_url().'admin/rooms/create');?>
			<div class="form-group">
				<label>Tipo Habitación</label>
				<?php echo form_dropdown('tip_habs',$list_typesrooms,set_value('tip_habs'),array('class'=>'form-control tip_habs-select'));?>
				<?php echo form_error('tip_habs', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Número</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'num_h','value'=>set_value('num_h'),'placeholder'=>'Número de la habitación'));?>
				<?php echo form_error('num_h', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			</div>	
			<div class="form-group texto-derecha">
				<?php echo form_submit('btnGuardar','Guardar',array('class'=>'btn btn-success'));?>
				<a href="<?php echo base_url().'admin/rooms'?>" class="btn btn-default">Cancelar</a>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>