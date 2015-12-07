<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM factura_descripcion WHERE nombre LIKE '%$dato%' ORDER BY idPedido ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="100">Id Pedido</th>
                <th width="200">Descripcion</th>
                <th width="100">Cantidad</th>
                <th width="100">Precio Unitario</th>
                <th width="200">Cliente</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['idPedido'].'</td>
								<td>'.$registro2['descripcion'].'</td>
								<td>'.$registro2['cantidad'].'</td>
                                <td>'.$registro2['precioU'].'</td>
                                <td>'.$registro2['nombre'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['nombre'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['nombre'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>