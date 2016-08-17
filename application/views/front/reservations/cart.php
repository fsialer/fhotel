<?php 
	echo form_error('quantity','<div class="alert alert-danger" role="alert">', '</div>');
?>
<?php 
$subtotal=0;
$total=0;
if ($this->session->userdata('detail_reservate')){
?>
<h2>FHotel</h2>
<hr>
<p>Fecha de llegada: <?php echo $this->session->userdata('reserva')['f_inicio']?></p>
<p>Fecha de Salida: <?php echo $this->session->userdata('reserva')['f_final']?></p>	
<p>Estancia: <?php echo $this->session->userdata('reserva')['estancia']?></p>	
<hr>

<?php 
$i=0;
foreach($this->session->userdata('detail_reservate') as $detail) 

{?>
<div class="panel panel-default">
	<div class="">
		<h4><?php echo $detail['typesrooms_name'];?></h4>
		<?php echo form_button(array('class'=>'btn btn-danger glyphicon glyphicon-trash texto-derecha btnAgregar'.$i,'onClick'=>'eliminar('.$detail['typeroom_id'].')'));?> 
		<hr>
	</div>
	<div class="panel-body">
		<p>Cantidad: <?php echo $detail['quantity'];?>, precio:S/.<?php echo $detail['typesrooms_price'];?></p>
		<div class="">
			<span class="label label-success letra-media">S/.<?php echo $this->session->userdata('reserva')['estancia']* $detail['quantity']*$detail['typesrooms_price'];$subtotal=$this->session->userdata('reserva')['estancia']* $detail['quantity']*$detail['typesrooms_price'];?></span>	 		
		</div>
	</div>
</div>
<?php
 		$total=$total+$subtotal;
 		$i++;
	}
?>
<hr>
<div>
	<h4>Total: <span class="icon-grande">S/.<?php echo $total;?></span></h4>
	<hr>
	<?php echo form_button(array('content'=>'CONFIRMAR',"class"=>"btn btn-info confirm",'name'=>'btnConfirmar','onClick'=>'confirmar()'));?>  
</div>
<?php
}
?>