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
    <header>SERVICIOS POR CLIENTE</header>
    <section>
    <table border="0" align="center">
    	<tr>
        	<td width="400"><input type="text" placeholder="Busca por Cliente" id="bs-factura"/></td>
           <!-- <td width="100"><button id="nuevo-producto" class="btn btn-primary">Nuevo</button></td>-->
            <td width="200"><a target="_blank" onclick="return exportarBusquedaFacturaAPdf($('#bs-factura').val())" class="btn btn-danger">Exportar a PDF</a></td>
        </tr>
    </table>
    </section>
    <div class="registros" id="agrega-registros">
    	<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="100">Id Pedido</th>
                <th width="200">Descripcion</th>
                <th width="100">Cantidad</th>
                <th width="100">Precio Unitario</th>
                <th width="200">Cliente</th>
            </tr>
            <?php 
					include('../php/conexion.php');
					$registro = mysql_query("SELECT * FROM factura_descripcion WHERE estado = 'OCUPADO' ORDER BY idPedido ASC");
					while($registro2 = mysql_fetch_array($registro)){
						echo '<tr>
								<td>'.$registro2['idPedido'].'</td>
								<td>'.$registro2['descripcion'].'</td>
								<td>'.$registro2['cantidad'].'</td>
                                <td>'.$registro2['precioU'].'</td>
                                <td>'.$registro2['nombre'].'</td>
								<td>
								    <a href="javascript:editarProducto('.$registro2['nombre'].');" class="glyphicon glyphicon-edit"></a>
								    <a href="javascript:eliminarProducto('.$registro2['nombre'].');" class="glyphicon glyphicon-remove-circle"></a>
								    <a href="consumo.php?idPedido='.$registro2['idPedido'].'" target="_blank"><img src="../recursos/pdf.gif" /></a>
								</td>

							</tr>';		
					}
			?>
        </table>
    </div>
    
    
</body>
</html>