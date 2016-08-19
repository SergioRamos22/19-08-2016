<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Usuarios</title>

<link rel="stylesheet" href="style.css" />

</head>

<body>
<div id="content">

<h1>Usuarios</h1>

<hr />

<?php
	include_once("conexion.php");

	$con = new usuario;
	$pacientes = $con->conectar();
	$strConsulta = "SELECT * from crear_cuenta";
	$pacientes = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($pacientes);
	
	echo '<table cellpadding="0" cellspacing="0" width="100%">';
	echo '<thead><tr><td>ID</td><td>Numero_documento</td><td>Nombre</td><td>Apellido</td><td>Nombre de usuario</td><td>Contrasenha</td></tr></thead>';
	for ($i=0; $i<$numfilas; $i++)
	{
		$fila = mysql_fetch_array($pacientes);
		$numlista = $i + 1;
		echo '<tr><td>'.$numlista.'</td>';
		echo '<td>'.$fila['Numero_documento'].'</td>';
		echo '<td>'.$fila['Nombre'].'</td>';
        echo '<td>'.$fila['Apellido'].'</td>';
		echo '<td>'.$fila['Nombre_de_usuario'].'</td>';
		echo '<td>'.$fila['Contrasenha'].'</td>';
		echo '<td><a href="reporte_usuarios.php?Numero_documento='.$fila['Numero_documento'].'">ver</a></td></tr>';
	}
	echo "</table>";
?>			

</div>
</body>
</html>