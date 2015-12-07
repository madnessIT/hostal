<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM habitacion_detalle WHERE codigo = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
               'codigo'  => $valores2['codigo'],
				'tipo'  => $valores2['tipo'],
				'tipo_banio'  => $valores2['tipo_banio'],
                'frigobar' => $valores2['frigobar'],
                'sofa_cama' => $valores2['sofa_cama'],
                'cama_Extra' => $valores2['cama_Extra'],
				'nr_simples' => $valores2['nr_simples'],
                'nro_matrimniales' => $valores2['nro_matrimniales'],
                'tarifa' => $valores2['tarifa'],
				'tipo_habitacion' => $valores2['tipo_habitacion'],
				);
echo json_encode($datos);
?>