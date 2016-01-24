<?php
require('../fpdf/fpdf.php');
require('../php/conexion.php');

//$pdf = new FPDF();
$pdf = new FPDF('P','mm',array(100,200));
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../recursos/hostal.jpg' , 40 ,8, 25 , 13,'JPG');
$pdf->Ln(10);
$pdf->Cell(10, 10, '', 0);
$pdf->Cell(40, 10, 'Calle Comercio 1455 esquina Bueno ', 0);
$pdf->Ln(10);
$pdf->Cell(22, 10, '', 0);
$pdf->Cell(40, 10, 'Telefono: 2202782 ', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(28, 8, '', 0);
$pdf->Cell(20, 8, 'FACTURA', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(25, 8, '', 0);
$pdf->Cell(20, 8, 'NIT: 123456789', 0);
$pdf->Ln(9);
$pdf->Cell(10, 8, '', 0);
$pdf->Cell(20, 8, 'NUM AUTORIZACION: 2904001450593', 0);
$pdf->Ln(9);
$pdf->Cell(40, 8, '-------------------------------', 0);
$pdf->Cell(20, 8, '-------------------------------', 0);
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
if(isset($_GET['textoBusqueda'])){
	$textoBusquedaEscapado = mysql_real_escape_string($_GET['textoBusqueda']);
	$condicion = " nombre LIKE '%$textoBusquedaEscapado%'";
}else if(isset($_GET['nombre'])){
	$condicion = " nombre = ".$_GET['nombre'];
}else{
	$condicion = "1=1";	//Solo por si acaso, si es que no llegó idPedido ni textoBusqueda. Por el momento esto no sucede.
}

$cuenta = mysql_query("SELECT nombre, costo_estadia, costo_serviciosExtra, total_pagado from cuenta where $condicion ");
$item = 0;
$totaluni = 0;
$totaldis = 0;
while($cuenta2 = mysql_fetch_array($cuenta)){
	//$item = $item+1;
	//$totaluni = $totaluni + $productos2['precio_unit'];
	//$totaldis = $totaldis + $productos2['precio_dist'];
	//$pdf->Cell(15, 8, $item, 0);
	//$pdf->Ln(2);
    $pdf->Cell(15, 8, 'Nombre', 0);
    $pdf->Cell(40, 8,$cuenta2['nombre'], 0);
    $pdf->Ln(9);
    $pdf->Cell(40, 8, 'Costo Estadia', 0);
    $pdf->Cell(40, 8, $cuenta2['costo_estadia'], 0);
	$pdf->Ln(10);
    $pdf->Cell(40, 8, 'Costo Servicios', 0);
    $pdf->Cell(40, 8, $cuenta2['costo_serviciosExtra'], 0);
	$pdf->Ln(11);
    $pdf->Cell(40, 8, 'Total Pagado', 0);
    $pdf->Cell(25, 8, $cuenta2['total_pagado'], 0);
    //$pdf->Cell(40, 8, $productos2['idPedido'], 0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114,8,'',0);
//$pdf->Cell(31,8,'Total Unitario: S/. '.$totaluni,0);
//$pdf->Cell(32,8,'Total Dist: S/. '.$totaldis,0);
$pdf->Output();
?>