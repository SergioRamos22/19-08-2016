<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte_Personal_usuarios.doc");


		$conexion=mysql_connect("localhost","root","");
		mysql_select_db("proyecto",$conexion);		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LISTA DE USUARIOS</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE DE LA TABLA USUARIOS</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    <td><strong>NNUMERO DE DOCUMENTO</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>APELLIDO</strong></td>
	<td><strong>NOMBRE DE USUARIO</strong></td>
	<td><strong>CONTRASENHA</strong></td>

  </tr>
  
<?PHP
		
$sql=mysql_query("SELECT * from crear_cuenta");
while($res=mysql_fetch_array($sql)){		

	$Numero_documento=$res["Numero_documento"];
	$Nombre=$res["Nombre"];
	$Apellido=$res["Apellido"];	
    $Nombre_de_usuario=$res["Nombre_de_usuario"];	
    $Contrasenha=$res["Contrasenha"];		

?>  
 <tr>
	<td><?php echo $Numero_documento; ?></td>
	<td><?php echo $Nombre; ?></td>
	<td><?php echo $Apellido; ?></td>
    <td><?php echo $Nombre_de_usuario; ?></td>  
    <td><?php echo $Contrasenha; ?></td>  	
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>
 
