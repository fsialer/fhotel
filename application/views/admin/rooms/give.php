<div class="col-md-8 panel panel-info center-block quitar-float">
	<div class="text-center">
			<h4>Listado de Habitaciones por asignar</h4>
	</div>
	<div class="row">
		<div class="col-md-6">
				<a href="<?php echo base_url().'admin/rooms/create'?>" class="btn btn-success">Agregar</a>
		</div>
		<div class="col-md-4">
			<?php echo form_open(base_url().'admin/rooms/give/search2');?>
				<div class="input-group">
				<?php
				if ($this->session->userdata('search2')) {
					echo form_input(array('name'=>'search','class'=>'form-control','placeholder'=>'Buscar por número de habitación','value'=>$this->session->userdata('search2')));
					echo form_label('<i class="glyphicon glyphicon-search"></i>','',array('class'=>'input-group-addon'));
				}else{
					echo form_input(array('name'=>'search','class'=>'form-control','placeholder'=>'Buscar por número de habitación'));
					echo form_label('<i class="glyphicon glyphicon-search"></i>','',array('class'=>'input-group-addon'));
				}
				?>
				</div>
			<?php echo form_close();?>
		</div>
		<div class="col-md-2">
			<?php echo form_open(base_url().'admin/rooms/give/show2');?>
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
			
			<p>Mostrar por: <?php echo form_dropdown('show_byh2',array('5'=>'5','10'=>'10'),set_value('show_byh2',$this->session->userdata("quantity2")),array('class'=>'show_byh2'));?></p>			
			<table class="table table-hover">
				<tr>
					<th>Huesped</th>
					<th>Documento</th>
					<th>Reserva</th>
					<th>Tipo de Habitación</th>
					<th>Número de habitación</th>				
					<th>Acciones</th>
				</tr>
				<?php
				foreach ($types_rooms as $type_room) {?>
					<tr>
						<td><?php echo $type_room->name_us.' '.$type_room->surname_us;?></td>
						<td><?php echo $type_room->document_us;?></td>
						<td><?php echo $type_room->id;?></td>
						<td><?php echo $type_room->name_tr;?></td>
						<td><?php echo $type_room->quantity_dtrr;?></td>
						<td>
							<a class="btn btn-warning" href="<?php echo base_url().'admin/rooms/assign/'.$type_room->detail_trre_id;?>">
									<span class="glyphicon glyphicon-wrench"></span>
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

