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
    <header>"Administracion Servicios"</header>
    <section>
    <table border="0" align="center">
    	<tr>
        	<td width="400"><input type="text" placeholder="Busca por codigo servicio" id="bs-food"/></td>
            <td width="100"><button id="nuevo-food" class="btn btn-primary">Nuevo</button></td>
            <td width="200"><a target="_blank" href="productos.php" class="btn btn-danger">Exportar a PDF</a></td>
        </tr>
    </table>
    </section>
    <div class="registros" id="agrega-registros">
    	<table class="table table-striped table-condensed table-hover">
        	<tr>
                <th width="100">Codigo</th>
            	<th width="200">Descripcion</th>
                <th width="200">Tipo</th>
                <th width="100">Precio</th>
                <th width="100">Unidad</th>
            <?php 
					include('../php/conexion.php');
					$registro = mysql_query("SELECT * FROM producto ORDER BY id ASC");
					while($registro2 = mysql_fetch_array($registro)){
						echo '<tr>
                                <td>'.$registro2['id'].'</td>
								<td>'.$registro2['descripcion'].'</td>
								<td>'.$registro2['tipo'].'</td>
								<td>Bs.'.$registro2['precio'].'</td>
                                <td>'.$registro2['unidad'].'</td>
                                <td><a href="javascript:editarFood('.$registro2['id'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarFood('.$registro2['id'].');" class="glyphicon glyphicon-remove-circle"></a></td>
							</tr>';		
					}
			?>
        </table>
    </div>
    
    
    <!-- MODAL PARA EL REGISTRO DE SERVICIOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registra o Edita un Habitacion</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return modificaFood();">
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
                        <td>Codigo: </td>
                        <td><input type="text" required="required" name="id" id="id" maxlength="100"/></td>
                    </tr>
                     
                    <tr>
                    	<td>Descripcion: </td>
                        <td><input type="number"  required="required" name="descripcion" id="descripcion"/></td>
                    </tr>
                    <tr>
                    	<td>Precio: </td>
                        <td><input type="number"  required="required" name="precio" id="precio"/></td>
                    </tr>
                    <tr>
                    	<td>Unidad: </td>
                        <td><input type="number"  required="required" name="unidad" id="unidad"/></td>
                    </tr>
                    <tr>
                    	<td>Servicio: </td>
                        <td><input type="number"  required="required" name="servicio" id="servicio"/></td>
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

<!--<tr>
                    	<td>Tipo Habitacion: </td>
                        <td><select required="required" name="tipo_habitacion" id="tipo_habitacion">
                                <option value="1">SIMPLE</option>
                                <option value="3">DOBLE</option>
                                <option value="4">TRIPLE</option>
                                <option value="2">FAMILIAR</option>
                            
                            </select></td>
                    </tr> -->
                   <!-- <tr>
                    	<td>Tipo Baño: </td>
                        <td><select required="required" name="tipo-banio" id="tipo-banio">
                        		<option value="COMPARTIDO">COMPARTIDO</option>
                                <option value="PRIVADO">PRIVADO</option>
                                
                            </select></td>
                    </tr>-->