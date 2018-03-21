$('form.form-crono').bind('submit', function(event) {
			
	event.preventDefault();
	/* Act on the event */
	var var_placanum=$('input[name="placanumero"]').val();
	var var_tipo=$('select[name="tipodecarro"]').val();
	var var_ano=$('select[name="anofab"]').val();
	var val_placa=$cronograma.valexptotal(var_placanum);

	//console.log(var_placanum);
	//console.log(var_tipo);
	//console.log(var_ano);
	//console.log('valplaca:'+ val_placa);
	//console.log($(".resultado-crono").html("otro"));

	if (var_placanum!='' && var_tipo!='' && var_ano!='' && val_placa) {
		$.ajax({
			url: base_url.value+'c_cronograma/calcular',
			type: 'POST',
			dataType: 'json',
			data: {placanumero:var_placanum, tipodecarro:var_tipo, anofab:var_ano},
		})
		.done(function(data) {
			console.log("success");
			var res=data;
			//console.log(res[0]);
			//console.log(res[1]);
			html=res[0]+' del '+res[1];
			html_comp=$cronograma.getTimeTense(res[0], res[1])+' <span id="resultado-mes">'+res[0]+' del '+res[1]+'</span>';
			$("#tit-res").html('RESULTADO:');
			$("#msj-res").html(html_comp);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}else if(!val_placa){
		$("#msj-res").html('La placa que ha ingresado es incorrecta. Ingrese una nueva placa.');
		$('.placaimg svg text #platenumber').html(var_placanum);
	}
});