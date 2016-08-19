<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ARTICULOS</title>
<link rel="icon" type="image/png" href="C:/wamp/www/PROYECTO/imgproyecto/26723.png" />
<style type="text/css">
body {
	background-image: url();
}
</style>
</head>

<body>
<p><img src="../imgproyecto/26723.png" width="256" height="256" />
  <label for="1"></label>
</p>
<p><br /> 
</p>
 <p>
  <marquee   scrollamount="25" behavior="alternate"  >
  
    
    
  <font color="#CCCCCC", size="10", face="impact">ARTICULOS</font>
  </marquee>
   </form>
 <p>&nbsp;</p>

</marquee>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
 
$host="localhost";
$usuario="root";
$password="";
$db="proyecto";

$conexion = new mysqli($host,$usuario,$password,$db);
$sql = "select * from articulos";
$query=$conexion->query($sql);
 
// $conexion = mysql_connect("localhost","root","");
//mysql_select_db("usuario",$conexion);
// $sql= mysql_query("select * from users");
//while($res=mysql_fetch_array($sql)){
	
//echo'<tr>
//		<td>'.$res['id'].'</td>
//		<td>'.$res['nombre'].'</td>
//		<td>'.$res['password'].'</td>
//	</tr>
//	';
//	}
	
	
			
	$tbHtml="";
	if($query->num_rows>0){
		
	        echo "<table border='1px'>
             <header>
                <tr>
                  <th>ID</th>
                  <th>Nombre Producto</th>
                
              
                  </tr>
            </header>";
		

		
		while($res=$query->fetch_array())
		{
// Configuración imagen, traer ubicación de la tabla y luego colocar dentro
// del html para decirle donde esta la imagen
$z=$res['Ubicacion'];
$x="<img src='$z' width='150' height='150' alt='Alargada' border='0'>";


		
         echo '<tr>
		<td>'.$res['idArticulos'].'</td>
		<td>'.$res['Nombre'].$x.'</td>
		
	</tr>
	';
		}
		$tbHtml.= "</table>";
	}
	else
	{
	echo "No hay resultados";
	}
	//cambiar los datos por productos
	
?>
 
