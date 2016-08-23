<div class="col-md-8 panel panel-info center-block quitar-float">
	<div class="text-center">
			<h4>Listado de Reservaciones</h4>
	</div>
	<div class="row">		
		<div class="col-md-4">
			<?php echo form_open(base_url().'admin/reservations/search');?>
				<div class="input-group">
				<?php
				if ($this->session->userdata('search')) {
					echo form_input(array('name'=>'search','class'=>'form-control','placeholder'=>'Buscar cliente por dni','value'=>$this->session->userdata('search')));
					echo form_label('<i class="glyphicon glyphicon-search"></i>','',array('class'=>'input-group-addon'));
				}else{
					echo form_input(array('name'=>'search','class'=>'form-control','placeholder'=>'Buscar cliente por dni'));
					echo form_label('<i class="glyphicon glyphicon-search"></i>','',array('class'=>'input-group-addon'));
				}
				?>
				</div>
			<?php echo form_close();?>
		</div>
		<div class="col-md-2">
			<?php echo form_open(base_url().'admin/reservations/show');?>
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
			
			<p>Mostrar por: <?php echo form_dropdown('show_byres',array('5'=>'5','10'=>'10'),set_value('show_byres',$this->session->userdata("quantity")),array('class'=>'show_byres'));?></p>			
			<table class="table table-hover">
				<tr>
					<th>#Reservación</th>	
					<th>Cliente</th>
					<th>Documento</th>	
					
					<th>Fecha Inicial</th>	
					<th>Fecha Final</th>		
					<th>Acciones</th>
				</tr>
				<?php
				foreach ($reservations as $reservation) {?>
					<tr>
						<td><?php echo $reservation->id;?></td>
						<td><?php echo $reservation->name_us.' '.$reservation->surname_us;?></td>
						<td><?php echo $reservation->document_us;?></td>						
						<td><?php echo $reservation->datestart_re;?></td>
						<td><?php echo $reservation->dateend_re;?></td>
						<td>
							<a class="btn btn-warning" href="<?php echo base_url().'admin/vouchers/create/'.$reservation->id;?>">
									<span class="glyphicon glyphicon-usd"></span>
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

