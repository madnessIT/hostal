<?php
include('conexion.php');
$id = $_POST['id'];
//OBTENEMOS LOS VALORES DEL PRODUCTO
$valores = mysql_query("SELECT * FROM producto WHERE codigo = '$id'");
$valores2 = mysql_fetch_array($valores);
$datos = array(
'id'  => $valores2['id'],
'descripcion'  => $valores2['descripcion'],
'precio'  => $valores2['precio'],
'unidad' => $valores2['unidad'],
'servicio' => $valores2['servicio'],
                );
echo json_encode($datos);
?>