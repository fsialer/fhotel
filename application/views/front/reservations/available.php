<div class="content-typeroom col-md-8">
	<?php
	$i=1; 
	foreach ($reservations as $reservation) {
		if ($reservation->available>0) {		
	?>
	<div class="panel panel-default">
		<div class="panel-body">
					<div class="row">
							<div class="col-md-6">
									<h4><strong><?php echo $reservation->name_tr;?></strong></h4>
							</div>
							<div class="col-md-6 form-inline texto-derecha">
							<?php echo form_input(array('type'=>'text','class'=>'form-control','name'=>'estancia'.$i,'placeholder'=>'Cantidad de habitaciones'));?>	
							<?php echo form_button(array('content'=>'Agregar','class'=>'btn btn-info btnAdd'.$i,'name'=>'btnBuscar','onClick'=>'add('.$i.')'));?>  
							</div>
					</div>
					<hr>	
					<p><h4><strong>Descripción:</strong></h4><?php echo $reservation->description_tr;?></p>
					<p><h4><strong>Capacidad máxima:</strong><?php echo $reservation->maxcap_tr;?></h4></p>
					<p><h4><strong>Habitaciones disponibles:</strong> <?php echo $reservation->available;?></h4></p>		
					<p><h4><strong>Costo:</strong> S/.<?php echo $reservation->price_tr;?> <small>por noche</small></h4></p>
					<p><h4><strong>Amenidades:</strong></h4>
					<?php
					foreach ($list_amenities as $amenity) {
						if ($reservation->typeroom_id == $amenity->typeroom_id) {
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