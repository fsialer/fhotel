<div class="col-md-8 panel panel-info center-block quitar-float">
	<div class="text-center">
			<h4>Listado de Amenidades</h4>
	</div>
	<div class="row">
		<div class="col-md-6">
				<a href="<?php echo base_url().'admin/amenities/create'?>" class="btn btn-success">Agregar</a>
		</div>
		<div class="col-md-4">
			<?php echo form_open(base_url().'admin/amenities/search');?>
				<div class="input-group">
				<?php
				if ($this->session->userdata('search')) {
					echo form_input(array('name'=>'search','class'=>'form-control','placeholder'=>'Buscar por amenidad','value'=>$this->session->userdata('search')));
					echo form_label('<i class="glyphicon glyphicon-search"></i>','',array('class'=>'input-group-addon'));
				}else{
					echo form_input(array('name'=>'search','class'=>'form-control','placeholder'=>'Buscar por amenidad'));
					echo form_label('<i class="glyphicon glyphicon-search"></i>','',array('class'=>'input-group-addon'));
				}
				?>
				</div>
			<?php echo form_close();?>
		</div>
		<div class="col-md-2">
			<?php echo form_open(base_url().'admin/amenities/show');?>
				<?php echo form_submit("btnMostrar", "Mostrar Todo", "class= 'btn btn-danger btn-block'");?>
			<?php echo form_close(); ?>
		</div>			
	</div>
		
	<div class="panel-body">	
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
		<div class="table-responsive">
			
			<p>Mostrar por: <?php echo form_dropdown('show_by',array('5'=>'5','10'=>'10'),set_value('show_by',$this->session->userdata("quantity")),array('class'=>'show_by'));?></p>			
			<table class="table table-striped">
				<tr>
					<th>Amenidades</th>
					<th>Estado</th>					
					<th>Acciones</th>
				</tr>
				<?php
				foreach ($amenities as $amenity) {?>
					<tr>
						<td><?php echo $amenity->name_am;?></td>
						<td><?php echo $amenity->state_am;?></td>
						<td>
							<a class="btn btn-warning" href="<?php echo base_url().'admin/amenities/edit/'.$amenity->id;?>">
									<span class="glyphicon glyphicon-wrench"></span>
							</a>
							<a class="btn btn-danger confirm" href="<?php echo base_url().'admin/amenities/delete/'.$amenity->id?>" >
									<span class="glyphicon glyphicon-remove-sign"></span>
							</a>
						</td>
					</tr>
				<?php
					}
				?>
			</table>
		</div>	
		<div class="text-center">
			<ul class="pagination">
				<?php
		    	echo $this->pagination->create_Links();
		    	?>
			</ul>	
		</div>					
	</div>	
</div>

