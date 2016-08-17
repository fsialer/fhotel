<div class="container">
		<div class="col-md-8 panel panel-default  center-block quitar-float">
			<div class="panel-heading">
				<h4>Registrate</h4>
			</div>
			<div class="panel-body">
				<?php echo form_open(base_url().'register');?>
					<div class="form-group">
						<label>Nombres:</label>
						<?php echo form_input(array('class'=>'form-control','name'=>'nom_us','value'=>set_value('nom_us')));?>
						<?php echo form_error('nom_us', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Apellidos:</label>
						<?php echo form_input(array('class'=>'form-control','name'=>'ape_us','value'=>set_value('ape_us')));?>
						<?php echo form_error('ape_us', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Documento:</label>
						<?php echo form_input(array('class'=>'form-control','name'=>'doc_us','value'=>set_value('doc_us')));?>
						<?php echo form_error('doc_us', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Dirección:</label>
						<?php echo form_input(array('class'=>'form-control','name'=>'dir_us','value'=>set_value('dir_us')));?>
						<?php echo form_error('dir_us', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Email:</label>
						<?php echo form_input(array('class'=>'form-control','name'=>'email_us','value'=>set_value('email_us')));?>
						<?php echo form_error('email_us', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Telefono/Celular:</label>
						<?php echo form_input(array('class'=>'form-control','name'=>'telf_us','value'=>set_value('telf_us')));?>
						<?php echo form_error('telf_us', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Contraseña:</label>
						<?php echo form_input(array('class'=>'form-control','name'=>'pass_us','value'=>set_value('pass_us'),'type'=>'password'));?>
						<?php echo form_error('pass_us', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
					</div>		
					<div class="form-group">
						<label>Repetir Contraseña:</label>
						<?php echo form_input(array('class'=>'form-control','name'=>'rpass_us','value'=>set_value('rpass_us'),'type'=>'password'));?>
						<?php echo form_error('rpass_us', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
					</div>					
					<div class="form-group texto-derecha">
						<?php echo form_submit('btnRegistrar','Registrar',array('class'=>'btn btn-success'));?>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
</div>