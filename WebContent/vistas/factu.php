<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hostal Republica</title>
<link href="../css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body>
    <header>FACTURA</header>
    <section>
    <table border="0" align="center">
    	<tr>
        	<td width="400"><input type="text" placeholder="Busca por Cliente" id="bs-factu"/></td>
           <!-- <td width="100"><button id="nuevo-producto" class="btn btn-primary">Nuevo</button></td>-->
            <td width="200"><a target="_blank" onclick="return exportarBusquedaFacturaAPdf1($('#bs-factu').val())" class="btn btn-danger">Generar Factura</a></td>
        </tr>
    </table>
    </section>
    <div class="registros" id="agrega-registros">
    	<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="200">Nombre</th>
                <th width="200">Costo Estadia</th>
                <th width="200">Costo Servicios</th>
                <th width="200">Total Pagado</th>
            </tr>
            <?php 
					include('../php/conexion.php');
					$registro = mysql_query("SELECT nombre, costo_estadia, costo_serviciosExtra, total_pagado from cuenta where total_pagado <> 0");
					while($registro2 = mysql_fetch_array($registro)){
						echo '<tr>
								<td>'.$registro2['nombre'].'</td>
								<td>'.$registro2['costo_estadia'].'</td>
								<td>'.$registro2['costo_serviciosExtra'].'</td>
                                <td>'.$registro2['total_pagado'].'</td>
								<td>


							</tr>';		
					}
			?>
        </table>
    </div>
    
    
</body>
</html>