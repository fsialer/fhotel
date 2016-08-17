<div class="container ">
	<div class="col-md-4 panel panel-default center-block quitar-float">
		<div class="row">
			<?php
			if ($this->session->flashdata('msg')) {
			?>
			<div class="<?php echo $this->session->flashdata('alert');?>">
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<?php echo $this->session->flashdata('msg');?>
			</div>			
			<?php
			}
			?>
		</div>
		<div class="panel-heading">
				<h4><span class="glyphicon glyphicon-user"></span> Iniciar Sesión</h4>
		</div>
		<div class="panel-body">
			<?php echo form_open(base_url().'auth');?>
			<div class="form-group input-group">
			<?php echo form_label('<i class="glyphicon glyphicon-user"></i>','',array('class'=>'input-group-addon'));?>
			<?php echo form_input(array('name'=>'email_us','class'=>'form-control','placeholder'=>'example@mail.com'))?>			
			</div>
			<?php echo form_error('email_us', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?php echo form_error('email', '<div class="">', '</div>'); ?>
			<div class="form-group input-group">
			<?php echo form_label('<i class="glyphicon glyphicon-lock"></i>','',array('class'=>'input-group-addon'));?>
			<?php echo form_input(array('name'=>'pass_us','class'=>'form-control','placeholder'=>'*****************','type'=>'password'))?>					
			</div>
			<?php echo form_error('pass_us', '<div class="alert alert-danger" role="alert">', '</div>'); ?>	
			<br>
			<div class="form-group texto-derecha">
			<?php echo form_submit('btnAcceder','Acceder',array('class'=>'btn btn-success'))?>
			</div>
			<div class="form-group">
				<a href="<?php echo base_url().'recovery'?>">¿Olvidastes tu contraseña?</a> <br>
				<a href="<?php echo base_url().'register'?>">¿Tienes una cuenta?</a>
			</div>
			<?php echo form_close();?>
		</div>
	</div>		
</div>
