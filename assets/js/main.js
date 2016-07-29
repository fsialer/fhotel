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

});