<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM producto WHERE id LIKE '%$dato%' ORDER BY id ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="100">codigo</th>
                <th width="200">Descripcion</th>
                <th width="200">Tipo</th>
                <th width="100">Precio</th>
                <th width="100">Unidad</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['id'].'</td>
                <td>'.$registro2['descripcion'].'</td>
				<td>'.$registro2['tipo'].'</td>
				<td>Bs.'.$registro2['precio'].'</td>
                <td>'.$registro2['unidad'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['id'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>