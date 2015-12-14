<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM servicio_cliente WHERE codigo LIKE '%$dato%' AND estado <> 'DISPONIBLE' ORDER BY codigo ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="100">Nombre</th>
                <th width="200">Descripcion</th>
                <th width="100">Cantidad</th>
                <th width="100">Precio Unitario</th>
                <th width="200">Total</th>
                <th width="200">Total</th>
                <th width="200">Habitacion</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
								<td>'.$registro2['nombre'].'</td>
								<td>'.$registro2['descripcion'].'</td>
								<td>'.$registro2['cantidad'].'</td>
                                <td>'.$registro2['precioU'].'</td>
                                <td>'.$registro2['total'].'</td>;
                                <td>'.$registro2['fecha'].'</td>;
                                <td>'.$registro2['codigo'].'</td>;

				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>