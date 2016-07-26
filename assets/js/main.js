$(document).ready(function(){
	$('.estado_am-select').chosen({
		width: "100%",
		allow_single_deselect: true,
		placeholder_text_single:"Eija un estado",
		no_results_text:"No se encuentran resultados con"
	});
	$('.show_by').chosen({
		width: "10%",
		allow_single_deselect: true,
		disable_search:true
	});
	$(".confirm").confirm({
		title:"Confirmacion de eliminación",
		text:"¿Estas seguro de querer eliminar este registro?",
		confirmButton:"Si",
		cancelButton:"No"
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

});