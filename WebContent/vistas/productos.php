<?php
require('../fpdf/fpdf.php');
require('../php/conexion.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../recursos/tienda.gif' , 10 ,8, 10 , 13,'GIF');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, 'Hostal Republica', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE SERVICIOS', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
//$pdf->Cell(15, 8, 'Item', 0);
$pdf->Cell(25, 8, 'Codigo', 0);
$pdf->Cell(40, 8, 'Descripcion', 0);
$pdf->Cell(25, 8, 'Tipo', 0);
$pdf->Cell(25, 8, 'Precio', 0);
$pdf->Cell(25, 8, 'Unidad', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$productos = mysql_query("SELECT * FROM producto ORDER BY id ASC");
$item = 0;
$totaluni = 0;
$totaldis = 0;
while($productos2 = mysql_fetch_array($productos)){
	//$item = $item+1;
	//$totaluni = $totaluni + $productos2['precio_unit'];
	//$totaldis = $totaldis + $productos2['precio_dist'];
	//$pdf->Cell(15, 8, $item, 0);
	$pdf->Cell(25, 8,$productos2['id'], 0);
	$pdf->Cell(40, 8, $productos2['descripcion'], 0);
	$pdf->Cell(25, 8, $productos2['tipo'], 0);
	$pdf->Cell(25, 8, $productos2['precio'].' Bs. ', 0);
    $pdf->Cell(25, 8, $productos2['unidad'], 0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114,8,'',0);
//$pdf->Cell(31,8,'Total Unitario: S/. '.$totaluni,0);
//$pdf->Cell(32,8,'Total Dist: S/. '.$totaldis,0);
$pdf->Output();
?>