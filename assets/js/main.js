$(document).ready(function(){
	$('.estado-select').chosen({
		width: "100%",
		allow_single_deselect: true,
		placeholder_text_single:"Elija un estado",
		no_results_text:"No se encuentran resultados con"
	});
	$('.show_by').chosen({
		width: "10%",
		allow_single_deselect: true,
		disable_search:true
	});
	$('.show_byth').chosen({
		width: "10%",
		allow_single_deselect: true,
		disable_search:true
	});
	$('.show_byh').chosen({
		width: "10%",
		allow_single_deselect: true,
		disable_search:true
	});
	$('.show_byres').chosen({
		width: "10%",
		allow_single_deselect: true,
		disable_search:true
	});
	$('.amenidades-select').chosen({
		width: "100%",
		placeholder_text_multiple:"Elija las amenidades que desee.",
		no_results_text:"No se encuentran resultados con"
	});
	$('.tip_habs-select').chosen({
		width: "100%",
		allow_single_deselect: true,
		placeholder_text_single:"Elija un tipo de habitación",
		no_results_text:"No se encuentran resultados con"
	});
	$(".confirm").confirm({
		title:"Confirmacion de eliminación",
		text:"¿Estas seguro de querer eliminar este registro?",
		confirmButton:"Si",
		cancelButton:"No"
	});
	$(".btnConfirmar").confirm({
		title:"Confirmacion de Reserva",
		text:"¿Estas seguro de querer realizar esta reservación?",
		confirmButton:"Si",
		cancelButton:"No"
	});
	$('#dpd1').on('changeDate',function(){
		var f1 = $('#dpd1').val();
		var f2=$('#dpd2').val();
		if (!f2) {
			$('#dpd2').on('changeDate',function(){
				var f1 = $('#dpd1').val();
				var f2=$('#dpd2').val();
				restaFechas(f1,f2);
			});
		}else{
			restaFechas(f1,f2);			
		}		
	});
	$('#dpd2').on('changeDate',function(){
		var f1 = $('#dpd1').val();
		var f2=$('#dpd2').val();
		restaFechas(f1,f2);					
	});
	$(".show_by").change(function(){
		var selected=$(this).val();
		$.ajax({
			url:"http://localhost/fconsulting/fhotel/admin/amenities/show_by",
			type:"POST",
			data:{quantity:selected},
			success:function(){
				window.location.href="http://localhost/fconsulting/fhotel/admin/amenities";
			}
		});
	});
	$(".show_byth").change(function(){
		var selected=$(this).val();
		$.ajax({
			url:"http://localhost/fconsulting/fhotel/admin/typesrooms/show_by",
			type:"POST",
			data:{quantity:selected},
			success:function(){
				window.location.href="http://localhost/fconsulting/fhotel/admin/typesrooms";
			}
		});
	});
	$(".show_byh").change(function(){
		var selected=$(this).val();
		$.ajax({
			url:"http://localhost/fconsulting/fhotel/admin/rooms/show_by",
			type:"POST",
			data:{quantity:selected},
			success:function(){
				window.location.href="http://localhost/fconsulting/fhotel/admin/rooms";
			}
		});
	});
	$(".show_byres").change(function(){
		var selected=$(this).val();
		$.ajax({
			url:"http://localhost/fconsulting/fhotel/admin/reservations/show_by",
			type:"POST",
			data:{quantity:selected},
			success:function(){
				window.location.href="http://localhost/fconsulting/fhotel/admin/reservations";
			}
		});
	});
});

function confirmar(){
	window.location.href="http://localhost/fconsulting/fhotel/auth";
}
function add(i){
	console.log(i);
	var cantidad=$(".cantidad"+i).val();
	var id=$(".tipohab"+i).val();
	var th_nom=$(".tipohabnom"+i).val();
	var th_precio=$(".thprecio"+i).val();
	console.log(cantidad.length);
	if (cantidad.length>0) {
		console.log("paso");
		$(".cantidad"+i).prop('disabled',true);
		$(".btnAdd"+i).attr("disabled","disabled");
	}	
	var doc={
		quantity:cantidad,
		typeroom_id:id,
		typesrooms_name:th_nom,
		typesrooms_price:th_precio
	}
	$.post('http://localhost/fconsulting/fhotel/shopping_cart',doc,function(data){
		$('.body-cart').empty()
		$('.body-cart').html(data);
	});
}
function eliminar(i){
	console.log(i);
	$(".cantidad"+i).prop('disabled',false);
	$(".btnAdd"+i).prop('disabled',false);
	var doc={		
		position:i
	}
	$.post('http://localhost/fconsulting/fhotel/delete_tr',doc,function(data){
		$('.body-cart').empty()
		$('.body-cart').html(data);
	});
}


var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 
var checkin = $('#dpd1').datepicker({
  onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.setValue(newDate);
  }
  checkin.hide();
  $('#dpd2')[0].focus();
}).data('datepicker');
var checkout = $('#dpd2').datepicker({
  onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  checkout.hide();
}).data('datepicker');

restaFechas = function(f1,f2)
 {
	 var aFecha1 = f1.split('/'); 
	 var aFecha2 = f2.split('/'); 
	 var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]); 
	 var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]); 
	 var dif = fFecha2 - fFecha1;
	 var dias = Math.floor(dif / (1000 * 60 * 60 * 24)); 
	 $('.stay').val(dias);	
 }
   
