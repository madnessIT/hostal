<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
</head>
<body>
    <header>DESCRIPCION CONSUMO</header>
    <section>
    <table border="0" align="center">
    	<tr>
        	<td width="400"><input type="text" placeholder="Busca por Habitacion" id="bs-factura"/></td>
           <!-- <td width="100"><button id="nuevo-producto" class="btn btn-primary">Nuevo</button></td>-->
            <td width="200"><a target="_blank" href="consumo.php" class="btn btn-danger">Exportar a PDF</a></td>
        </tr>
    </table>
    </section>
    <div class="registros" id="agrega-registros">
    	<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="100">Nombre</th>
                <th width="200">Descripcion</th>
                <th width="100">Cantidad</th>
                <th width="100">Precio Unitario</th>
                <th width="200">Total</th>
                <th width="200">Fecha</th>
                <th width="200">Habitacion</th>
                
                
            </tr>
            <?php 
					include('../php/conexion.php');
					$registro = mysql_query("select nombre, descripcion, cantidad, precioU, total, fecha, codigo, estado from servicio_cliente where estado <> 'DISPONIBLE' ");
					while($registro2 = mysql_fetch_array($registro)){
						echo '<tr>
								<td>'.$registro2['nombre'].'</td>
								<td>'.$registro2['descripcion'].'</td>
								<td>'.$registro2['cantidad'].'</td>
                                <td>'.$registro2['precioU'].'</td>
                                <td>'.$registro2['total'].'</td>
                                <td>'.$registro2['fecha'].'</td>
                                <td>'.$registro2['codigo'].'</td>
                                
							</tr>';		
					}
			?>
        </table>
    </div>
    
    
</body>
</html>