<?php
include("koneksi.php");
?>
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="selectdesa.js"></script>
</head>
<body>
    <header>DESCRIPCION FACTURA</header>
Cliente: 
<select name="desa" onChange="showDesa(this.value)" id="combo">
		<option></option>
	<?php
        $query="select * from cliente_cuenta where total_pagado <> '0' group by nombre";
        $rs = mysql_query($query);
        while($result_data = mysql_fetch_array($rs))
        {
            list($id, $nombre)=$result_data;
	?>
        <option value="<?php echo "$id"?>"><?php echo "$nombre"?></option>
	<?php
    }
	?>
	</select>
	<br/><br/>
	<div id="txtHint"></div>
<td width="200"><a target="_blank" href="facturacion.php" class="btn btn-danger" id = 'sss'>Exportar a PDF</a></td> 
    </body>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</html>
<script>
$(document).ready(function()
{
    
    $("#combo").click(function()
    {

        console.log($(this).val());
    });
    $("#sss").click(function()
    {
        $.ajax(
        {
            url: "facturacion.php", 
            type:'GET',
            cache: false,
            data:{
                "x": $("#combo").val(),
                perro: 'sdv'
            },
            success: function(result)
            
               alert('llamo')
            });    
    });
});
</script>