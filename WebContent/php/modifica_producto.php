<?php
include('conexion.php');

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$tipo_banio = $_POST['tipo-banio'];
$frigobar = $_POST['frigobar'];
$sofa_cama = $_POST['sofa-cama'];
$cama_Extra = $_POST['cama-extra'];
$nr_simples = $_POST['nro-simple'];
$nro_matrimniales = $_POST['nro-matri'];
$tipo_habitacion = $_POST['tipo_habitacion'];
$tarifa = $_POST['tarifa'];
//VERIFICAMOS EL PROCESO
$proceso = $_POST['pro'];


switch($proceso){
	case 'Registro':
		$id = $codigo;	//Revisar
		$query = "INSERT INTO habitacion (id, codigo, tipo_banio, frigobar, sofa_cama, cama_Extra, nr_simples, nro_matrimniales, tipo_habitacion,tarifa) VALUES('$id', '$codigo','$tipo_banio','$frigobar','$sofa_cama','$cama_Extra','$nr_simples','$nro_matrimniales','$tipo_habitacion','$tarifa')";
		mysql_query($query);
	break;
	
	case 'Edicion':
		$query = "UPDATE habitacion SET id = '$id', codigo = '$codigo', tipo_banio = '$tipo_banio',frigobar = '$frigobar',sofa_cama = '$sofa_cama',cama_Extra = '$cama_Extra',nr_simples = '$nr_simples',nro_matrimniales = '$nro_matrimniales',tipo_habitacion = '$tipo_habitacion', tarifa = '$tarifa' WHERE codigo = '$codigo'";
		mysql_query($query);
	break;
}

//die($query);

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM habitacion_detalle ORDER BY codigo ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="200">Numero</th>
                <th width="200">Tipo</th>
                <th width="100">Tipo Baño</th>
                <th width="100">Frigobar</th>
                <th width="100">Sofa Cama</th>
                <th width="100">Cama Extra</th>
                <th width="100">Numero Simples</th>
                <th width="100">Numero Matrimoniales</th>
                <th width="100">Tarifa</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<<td>'.$registro2['id'].'</td>
								<td>'.$registro2['codigo'].'</td>
								<td>'.$registro2['tipo'].'</td>
								<td>'.$registro2['tipo_banio'].'</td>
                                <td>'.$registro2['frigobar'].'</td>
                                <td>'.$registro2['sofa_cama'].'</td>
                                <td>'.$registro2['cama_Extra'].'</td>
                                <td>'.$registro2['nr_simples'].'</td>
                                <td>'.$registro2['nro_matrimniales'].'</td>
								<td>Bs.'.$registro2['tarifa'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['codigo'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['codigo'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>