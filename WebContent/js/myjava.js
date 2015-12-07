$(function(){
	
	$('#nuevo-producto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-producto').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/busca_producto.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
});

function modificaRegistro(){
	var url = '../php/modifica_producto.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}

function eliminarProducto(id){
	var url = '../php/elimina_producto.php';
	var pregunta = confirm('¿Esta seguro de eliminar esta Habitacion?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}

function editarProducto(id){
	$('#formulario')[0].reset();
	var url = '../php/edita_producto.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = JSON.parse(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				$('#id').val(id);
				$('#codigo').val(datos['codigo']);
				//console.log(JSON.stringify(datos));
				//$('#tipo').val(datos['tipo']);
				$('#tipo-banio').val(datos['tipo_banio']);
				$('#frigobar').val(datos['frigobar']);
                $('#sofa-cama').val(datos['sofa_cama']);
                $('#cama-extra').val(datos['cama_Extra']);
                $('#nro-simple').val(datos['nr_simples']);
                $('#nro-matri').val(datos['nro_matrimniales']);
                $('#tarifa').val(datos['tarifa']);
				$('#tipo_habitacion').val(datos['tipo_habitacion']);
				$('#registra-producto').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

// ADMINISTRACION SERVICIOS
$(function(){
	
	$('#nuevo-food').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-producto').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#bs-food').on('keyup',function(){
		var dato = $('#bs-food').val();
		var url = '../php/busca_food.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
});

/*function modificafood(){
	var url = '../php/modifica_food.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}*/

function eliminarFood(id){
	var url = '../php/elimina_food.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Item?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}

function modificaFood(){
	var url = '../php/modifica_food.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}

function editarFood(id){
	$('#formulario')[0].reset();
	var url = '../php/edita_food.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = JSON.parse(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				$('#id').val(id);
				$('#descripcion').val(datos['descripcion']);
				$('#precio').val(datos['precio']);
				$('#unidad').val(datos['unidad']);
                $('#servicio').val(datos['servicio']);
               /* $('#cama-extra').val(datos['cama_Extra']);
                $('#nro-simple').val(datos['nr_simples']);
                $('#nro-matri').val(datos['nro_matrimniales']);
                $('#tarifa').val(datos['tarifa']);
				$('#tipo_habitacion').val(datos['tipo_habitacion']);*/
				$('#registra-producto').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

// SERVICIOS POR CLIENTE

$(function(){
	
	$('#nuevo-factura').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-producto').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#bs-factura').on('keyup',function(){
		var dato = $('#bs-factura').val();
		var url = '../php/busca_factura.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
});