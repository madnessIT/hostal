<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tienda</title>
<link href="../css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sampel Project Ajax</title>
<script src="selectdesa.js"></script>
</head>
<body>
<?php
	$q = $_GET["q"];
	include("koneksi.php");
	
	$sql = "SELECT nombre, costo_estadia, costo_serviciosExtra, sum(costo_estadia + costo_serviciosExtra) as Total, total_pagado from cuenta  where id = '".$q."'";
	$result = mysql_query($sql);
	
	$sql2 = "SELECT * FROM cuenta WHERE id = '".$q."'";
	$result2 = mysql_query($sql2);
	$row2 = mysql_fetch_assoc($result2);
	
	?>
	Cliente: <b><?php echo strtoupper ($row2['nombre'])?> </b>
	<?php
	echo "<table class='table table-striped table-condensed table-hover'>
            <tr>
            <th>Nombre</th> 
            <th>Costo Estadia</th> 
            <th>Costo Servicio</th>
            <th>Total</th> 
            <th>Total Pagado</th>    
			</tr>";
		
	while($row = mysql_fetch_array($result)){
		echo "<tr>";
                echo "<td>" . $row['nombre'] . "</td>"; 
                echo "<td>" . $row['costo_estadia'] . "</td>";
                echo "<td>" . $row['costo_serviciosExtra'] . "</td>";
                echo "<td>" . $row['Total'] . "</td>"; 
                echo "<td>" . $row['total_pagado'] . "</td>";
        
		echo "</tr>";
	}
	echo "</table>";
?>
    </body>
</html>