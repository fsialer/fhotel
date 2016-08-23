<div class="container">
	<div class="col-md-8 center-block panel panel-success quitar-float">
		<div class="text-center">
			<h2>COMPROBANTE DE PAGO</h2>
		</div>
		<div class="panel-body">
			<?php echo form_open(base_url().'admin/vouchers/create/'.$reservation['reserva']->id);?>
			<div class="row">
				<div class="col-md-4 form-group">
					<label>Reservación</label>
					<?php echo form_input(array('class'=>'form-control','name'=>'reser_id','readOnly'=>'TRUE','value'=>set_value('reser_id',$reservation['reserva']->id)));?>
				</div>
				<div class="form-group col-md-4 ">
					<label>Fecha</label>
					<div class="input-group">
					<?php echo form_input(array('type'=>'date','class'=>'form-control','name'=>'fecha_v','value'=>date('Y-m-d'),'readOnly'=>'TRUE'));?>
					 <div class="input-group-addon">
       				 <span class="glyphicon glyphicon-calendar"></span>
   				 	</div>   				
					</div>
				</div>
						
			</div>
			<div class="row">
				<div class="col-md-8 form-group">
					<label>Huesped</label>
					<?php echo form_input(array('class'=>'form-control','name'=>'datos_hu','readOnly'=>'TRUE','value'=>set_value('datos_hu',$reservation['reserva']->name_us.' '.$reservation['reserva']->surname_us)));?>
				</div>		
				<div class="col-md-4 form-group">
					<label>Documento</label>
					<?php echo form_input(array('class'=>'form-control','name'=>'doc_hu','readOnly'=>'TRUE','value'=>set_value('doc_hu',$reservation['reserva']->document_us)));?>
				</div>				
			</div>
			<div class="row">
				<div class="col-md-4 form-group">
					<label>Estancia</label>
					<?php echo form_input(array('class'=>'form-control','name'=>'estancia_hu','readOnly'=>'TRUE','value'=>set_value('estancia_hu',$reservation['reserva']->quantity_stay)));?>
				</div>
				<div class="form-group col-md-4 ">
					<label>Fecha de Entrada</label>
					<div class="input-group">
					<?php echo form_input(array('type'=>'date','class'=>'form-control','name'=>'finicio_re','value'=>set_value('finicio_re',$reservation['reserva']->datestart_re),'readOnly'=>'TRUE'));?>
					 <div class="input-group-addon">
       				 <span class="glyphicon glyphicon-calendar"></span>
   				 	</div>   				
					</div>
				</div>
				<div class="form-group col-md-4 ">
					<label>Fecha d Salida</label>
					<div class="input-group">
					<?php echo form_input(array('type'=>'date','class'=>'form-control','name'=>'ffinal_re','value'=>set_value('ffinal_re',$reservation['reserva']->dateend_re),'readOnly'=>'TRUE'));?>
					 <div class="input-group-addon">
       				 <span class="glyphicon glyphicon-calendar"></span>
   				 	</div>   				
					</div>
				</div>
			</div>
			<div class="row">
				<table class="table table-hover">
					<tr>
						<th>Tipo de Habitación</th>	
						<th>Cantidad de habitaciones</th>
						<th>Precio</th>	
						<th>Subtotal</th>
					</tr>
					<?php
					$total=0;
					$igv=0.9;
					foreach ($reservation['detalle'] as $detalle) {
						$total+=$detalle->subtotal_dtrr;
					?>
					<tr>
						<td><?php echo $detalle->name_tr;?></td>
						<td><?php echo $detalle->quantity_dtrr;?></td>
						<td><?php echo $detalle->price_tr;?></td>
						<td><?php echo $detalle->subtotal_dtrr;?></td>
					</tr>
					<?php 
						}
						$igv_total=$total-($total*$igv);
						$ttotal=$total+$igv_total;
					?>
				</table>
			</div>
			<div class="row">
				<div class="col-md-4 form-group">
					<label>IGV</label>
					<?php echo form_input(array('value'=>set_value('igv',$igv),'class'=>'form-control','name'=>'igv','readOnly'=>'TRUE'));?>
				</div>
				<div class="col-md-4 form-group">
					<label>IGV Total</label>
					<?php echo form_input(array('value'=>set_value('igv_total',$igv_total),'class'=>'form-control','name'=>'igv_total','readOnly'=>'TRUE'));?>
				</div>		
				<div class="col-md-4 form-group">
					<label>Total</label>
					<?php echo form_input(array('value'=>set_value('ttotal',$ttotal),'class'=>'form-control','name'=>'ttotal','readOnly'=>'TRUE'));?>
				</div>				
			</div>
			<div class="row">
				<div class="form-group texto-derecha">
					<?php echo form_submit('btnGuardar','Guardar-Imprimir',array('class'=>'btn btn-success'));?>
					<a href="<?php echo base_url().'admin/reservations'?>" class="btn btn-default">Cancelar</a>
				</div>		
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>