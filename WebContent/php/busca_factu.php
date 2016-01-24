<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT nombre, costo_estadia, costo_serviciosExtra, total_pagado from cuenta WHERE nombre LIKE '%$dato%' ORDER BY nombre ASC");
                            
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="200">Nombre</th>
                <th width="100">Costo Estadia</th>
                <th width="100">Costo Servicios</th>
                <th width="100">Total</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
								<td>'.$registro2['nombre'].'</td>
								<td>'.$registro2['costo_estadia'].'</td>
                                <td>'.$registro2['costo_serviciosExtra'].'</td>
                                <td>'.$registro2['total_pagado'].'</td>
								<td>
									<a href="javascript:editarProducto('.$registro2['nombre'].');" class="glyphicon glyphicon-edit"></a>
									<a href="javascript:eliminarProducto('.$registro2['nombre'].');" class="glyphicon glyphicon-remove-circle"></a>
									<a href="facturacion.php?nombre='.$registro2['nombre'].'" target="_blank"><img src="../recursos/pdf.gif" /></a>
								</td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>