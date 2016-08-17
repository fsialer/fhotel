<div class="col-md-8 panel panel-info center-block quitar-float">
	<div class="text-center">
			<h4>Listado de Tipo de habitaciones</h4>
	</div>
	<div class="row">
		<div class="col-md-6">
				<a href="<?php echo base_url().'admin/typesrooms/create'?>" class="btn btn-success">Agregar</a>
		</div>
		<div class="col-md-4">
			<?php echo form_open(base_url().'admin/typesrooms/search');?>
				<div class="input-group">
				<?php
				if ($this->session->userdata('search')) {
					echo form_input(array('name'=>'search','class'=>'form-control','placeholder'=>'Buscar por Tipo de habitación','value'=>$this->session->userdata('search')));
					echo form_label('<i class="glyphicon glyphicon-search"></i>','',array('class'=>'input-group-addon'));
				}else{
					echo form_input(array('name'=>'search','class'=>'form-control','placeholder'=>'Buscar por Tipo de habitación'));
					echo form_label('<i class="glyphicon glyphicon-search"></i>','',array('class'=>'input-group-addon'));
				}
				?>
				</div>
			<?php echo form_close();?>
		</div>
		<div class="col-md-2">
			<?php echo form_open(base_url().'admin/typesrooms/show');?>
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
			
			<p>Mostrar por: <?php echo form_dropdown('show_byth',array('5'=>'5','10'=>'10'),set_value('show_by',$this->session->userdata("quantity")),array('class'=>'show_byth'));?></p>			
			<table class="table table-hover">
				<tr>
					<th>Tipo de habitación</th>
					<th>Descripción</th>
					<th>Capacidad máxima</th>
					<th>Precio</th>	
					<th>Estado</th>					
					<th>Acciones</th>
				</tr>
				<?php
				foreach ($types_rooms as $type_room) {?>
					<tr>
						<td><?php echo $type_room->name_tr;?></td>
						<td><?php echo $type_room->description_tr;?></td>
						<td><?php echo $type_room->maxcap_tr;?></td>
						<td><?php echo $type_room->price_tr;?></td>
						<td><?php echo $type_room->state_tr;?></td>
						<td>
							<a class="btn btn-warning" href="<?php echo base_url().'admin/typesrooms/edit/'.$type_room->id;?>">
									<span class="glyphicon glyphicon-wrench"></span>
							</a>
							<a class="btn btn-danger confirm" href="<?php echo base_url().'admin/typesrooms/delete/'.$type_room->id?>" >
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

