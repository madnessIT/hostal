<?php
require('../fpdf/fpdf.php');
require('../php/conexion.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../recursos/tienda.gif' , 10 ,8, 10 , 13,'GIF');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, 'Hostal Republica"', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE HABITACIONES', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
//$pdf->Cell(15, 8, 'Item', 0);
$pdf->Cell(80, 8, 'Numero Habitacion', 0);
$pdf->Cell(40, 8, 'Tipo Habitacion', 0);
$pdf->Cell(25, 8, 'Tipo Baño', 0);
$pdf->Cell(25, 8, 'Tarifa', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
//< HEAD
$productos = mysql_query("SELECT * FROM habitacion ORDER BY codigo ASC");
//=======
$productos = mysql_query("SELECT * FROM habitacion_detalle");
//>>>>>>> origin/master
$item = 0;
$totaluni = 0;
$totaldis = 0;
while($productos2 = mysql_fetch_array($productos)){
	//$item = $item+1;
	//$totaluni = $totaluni + $productos2['precio_unit'];
	//$totaldis = $totaldis + $productos2['precio_dist'];
	//$pdf->Cell(15, 8, $item, 0);
	$pdf->Cell(80, 8,$productos2['codigo'], 0);
	$pdf->Cell(40, 8, $productos2['tipo'], 0);
	$pdf->Cell(25, 8, $productos2['tipo_banio'], 0);
	$pdf->Cell(25, 8, $productos2['tarifa'].' Bs. ', 0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114,8,'',0);
//$pdf->Cell(31,8,'Total Unitario: S/. '.$totaluni,0);
//$pdf->Cell(32,8,'Total Dist: S/. '.$totaldis,0);
$pdf->Output();
?>