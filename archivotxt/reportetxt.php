<?php
 header('Content-type: application/vnd.ms-word');
 header("Content-Disposition: attachment; filename=archivo.txt");
 header("Pragma: no-cache");
 header("Expires: 0");
 
 
 $conexion = mysql_connect("localhost","root","");
	mysql_select_db("proyecto",$conexion);
 


$sql= mysql_query("select * from crear_cuenta");
while($res=mysql_fetch_array($sql)){
	
echo'<tr>
		<td>'.$res['Numero_documento'].'</td>
		<td>'.$res['Nombre'].'</td>
		<td>'.$res['Nombre_de_usuario'].'</td>
		<td>'.$res['Contrasenha'].'</td>
	</tr>
	<br>
	';
}
?>
 