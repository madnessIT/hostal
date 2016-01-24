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
    <header>"Administracion Habitaciones"</header>
    <section>
    <table border="0" align="center">
    	<tr>
        	<td width="400"><input type="text" placeholder="Busca por Numero Habitacion" id="bs-prod"/></td>
            <td width="100"><button id="nuevo-producto" class="btn btn-primary">Nuevo</button></td>
            <td width="200"><a target="_blank" href="habitaciones.php" class="btn btn-danger">Exportar a PDF</a></td>
        </tr>
    </table>
    </section>
    <div class="registros" id="agrega-registros">
    	<table class="table table-striped table-condensed table-hover">
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
            </tr>
            <?php 
					include('../php/conexion.php');
					$registro = mysql_query("SELECT * FROM habitacion_detalle ORDER BY codigo ASC");
					while($registro2 = mysql_fetch_array($registro)){
						echo '<tr>
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
			?>
        </table>
    </div>
    
    
    <!-- MODAL PARA EL REGISTRO DE HABITACIONES-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registra o Edita un Habitacion</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return modificaRegistro();">
            <div class="modal-body">
				<table border="0" width="100%">
               		 <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id" name="id" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                    	<td width="150">Proceso: </td>
                        <td><input type="text" required="required" readonly="readonly" id="pro" name="pro"/></td>
                    </tr>
                    <tr>
                        <td>Numero Habitacion: </td>
                        <td><input type="text" required="required" name="codigo" id="codigo" maxlength="100"/></td>
                    </tr>
                    <tr>
                    	<td>Tipo Habitacion: </td>
                        <td><select required="required" name="tipo_habitacion" id="tipo_habitacion">
                                <option value="1">SIMPLE</option>
                                <option value="3">DOBLE</option>
                                <option value="4">TRIPLE</option>
                                <option value="2">FAMILIAR</option>
                            
                            </select></td>
                    </tr>
                    <tr>
                    	<td>Tipo Baño: </td>
                        <td><select required="required" name="tipo-banio" id="tipo-banio">
                        		<option value="COMPARTIDO">COMPARTIDO</option>
                                <option value="PRIVADO">PRIVADO</option>
                                
                            </select></td>
                    </tr>
                    <tr>
                    	<td>Frigobar: </td>
                        <td><input type="number"  required="required" name="frigobar" id="frigobar"/></td>
                    </tr>
                    <tr>
                    	<td>Sofa Cama: </td>
                        <td><input type="number"  required="required" name="sofa-cama" id="sofa-cama"/></td>
                    </tr>
                    <tr>
                    	<td>Cama Extra: </td>
                        <td><input type="number"  required="required" name="cama-extra" id="cama-extra"/></td>
                    </tr>
                    <tr>
                    	<td>Numero Simples: </td>
                        <td><input type="number"  required="required" name="nro-simple" id="nro-simple"/></td>
                    </tr>
                    <tr>
                    	<td>Numero Matrimoniales: </td>
                        <td><input type="number"  required="required" name="nro-matri" id="nro-matri"/></td>
                    </tr>
                    <tr>
                    	<td>Tarifa: </td>
                        <td><input type="number"  required="required" name="tarifa" id="tarifa"/></td>
                    </tr>
                    <tr>
                    	<td colspan="2">
                        	<div id="mensaje"></div>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
      </div>
      

</body>
</html>
