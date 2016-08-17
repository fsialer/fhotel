<div class="container">
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
	<div class="text-center">
		<h2>Reservación</h2>
	</div>
	<div class="panel panel-default">
		<div class="panel-body form-inline text-center">
		<?php echo form_open(base_url().'reservation')?>
			<div class="form-group">
				<div class="input-group">
				<?php echo form_input(array('type'=>'text','class'=>'form-control finicio_re','name'=>'finicio_re','id'=>'dpd1','data-date-format'=>"dd/mm/yyyy",'placeholder'=>'Fecha de llegada','value'=>set_value('finicio_re')));?>
				 <div class="input-group-addon">
       				 <span class="glyphicon glyphicon-calendar"></span>
   				 </div>   				
				</div>				
			</div>				
			<div class="form-group">			
				<?php echo form_input(array('type'=>'number','class'=>'form-control stay','name'=>'estancia','readOnly'=>true,'placeholder'=>'Estancia','value'=>set_value('estancia')));?>
			</div>
			<div class="form-group">
				<div class="input-group">
				<?php echo form_input(array('type'=>'text','class'=>'form-control ffin_re','name'=>'ffin_re','id'=>'dpd2','data-date-format'=>"dd/mm/yyyy",'placeholder'=>'Fecha de Salida','value'=>set_value('ffin_re')));?>
				<div class="input-group-addon">
       				 <span class="glyphicon glyphicon-calendar"></span>
   				 </div>   				 
   				</div>   				
			</div>
			<div class="input-group">	
				<?php echo form_submit('btnSearch','Buscar Disponibles',array('class'=>'btn btn-info'));?> 				
   			</div>	
   		<?php echo form_close()?>			
		</div>
		 <?php echo form_error('finicio_re', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
		 <?php echo form_error('ffin_re', '<div class="alert alert-danger" role="alert">', '</div>'); ?>		
	</div>
	<div class="result">
		<?php if ($types_rooms) {
		?>
			<div class="content-typeroom col-md-8">
			<?php
			$i=1; 
			foreach ($types_rooms as $type_room) {
			if ($type_room->available>0) {		
			?>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
							<div class="col-md-6">
									<h4><strong><?php echo $type_room->name_tr;?></strong></h4>
									<?php echo form_input(array('type'=>'hidden','class'=>'tipohabnom'.$i,'name'=>'tipohabnom'.$type_room->id,'value'=>$type_room->name_tr));?>	
									<?php echo form_input(array('type'=>'hidden','class'=>'tipohab'.$type_room->id,'name'=>'tipohab'.$type_room->id,'value'=>$type_room->id));?>	
							</div>
							<div class="col-md-6 form-inline texto-derecha">
							<?php echo form_input(array('type'=>'number','value'=>set_value('cantidad'.$type_room->id,1),'class'=>'form-control cantidad'.$type_room->id,'name'=>'cantidad'.$type_room->id,'placeholder'=>'Cantidad de habitaciones'));?>	
							<?php echo form_button(array('content'=>'Agregar','class'=>'btn btn-info btnAdd'.$type_room->id,'name'=>'btnBuscar','onClick'=>'add('.$type_room->id.')'));?>  
							</div>
					</div>
					<hr>	
					<p><h4><strong>Descripción:</strong></h4><?php echo $type_room->description_tr;?></p>
					<p><h4><strong>Capacidad máxima:</strong><?php echo $type_room->maxcap_tr;?></h4></p>
					<p><h4><strong>Habitaciones disponibles:</strong> <?php echo $type_room->available;?></h4></p>		
					<p><h4><strong>Costo:</strong> S/.<?php echo $type_room->price_tr;?> <small>por noche</small></h4></p>
					<?php echo form_input(array('type'=>'hidden','class'=>'thprecio'.$type_room->id,'name'=>'thprecio'.$type_room->id,'value'=>$type_room->price_tr));?>	
					<p><h4><strong>Amenidades:</strong></h4>
					<?php
					foreach ($list_amenities as $amenity) {
						if ($type_room->id == $amenity->typeroom_id) {
					?>
							<span class="label label-info"><?php echo $amenity->name_am;?></span> 
					<?php	
						}
					?>
					<?php
					}
					?>
					</p>	
				</div>
			</div>
			<?php 
			$i++;
				}
			}
			?>
</div>
<div class="content-carshop col-md-4">
	<div class="panel panel-default">
			<div class="panel-heading text-center">							
				<h4><strong>Mi Reserva</strong></h4>
			</div>
			<div class="panel-body text-center body-cart">
				<span class="glyphicon glyphicon-circle-arrow-down icon-grande"></span>
				<span class="glyphicon glyphicon-option-horizontal icon-grande"></span>
				<span class="glyphicon glyphicon-shopping-cart icon-grande"></span>
				<hr>
				<p>
						<h4>El carrito de compras esta vacio, agregue algún item</h4>
				</p>
			</div>
	</div>
</div>
			<?php
		}
		?>	
	</div>	
</div>