<?php
include('conexion.php');

$id = $_POST['id'];



//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM producto WHERE id = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM producto ORDER BY id ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="100">Codigo</th>
            	<th width="200">Descripcion</th>
                <th width="200">Tipo</th>
                <th width="100">Precio</th>
                <th width="100">Unidad</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['id'].'</td>
								<td>'.$registro2['descripcion'].'</td>
								<td>'.$registro2['tipo'].'</td>
								<td>Bs.'.$registro2['precio'].'</td>
                                <td>'.$registro2['unidad'].'</td>
				<td><a href="javascript:editarFood('.$registro2['id'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarFood('.$registro2['id'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';

?>