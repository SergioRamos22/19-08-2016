<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new articulos();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
              $alm->__SET('idArticulos',              $_REQUEST['idArticulos']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
			$alm->__SET('Ubicacion',          $_REQUEST['Ubicacion']);
            $alm->__SET('idProveedor',        $_REQUEST['idProveedor']);

            $model->Actualizar($alm);
            header('Location: modificar.php');
            break;

        case 'registrar':
       
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
			$alm->__SET('Ubicacion',          $_REQUEST['Ubicacion']);
            $alm->__SET('idProveedor',        $_REQUEST['idProveedor']);

            $model->Registrar($alm);
            header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idArticulos']);
            header('Location: modificar.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idArticulos']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>MODIFICAR DATOS</title>
         <link rel="icon" type="image/png" href="C:/wamp/www/PROYECTO/26723.png" />
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <style type="text/css">
        body {
	background-image: url(../imgproyecto/apple_mac_os_x_el_capitan-1920x1080.jpg);
}
        body,td,th {
	color: #FFF;
}
        </style>
    <meta charset="utf-8">
    </head>
    <body >

        <div class="pure-g">
            <div class="pure-u-1-12">
                
              <form action="?action=<?php echo $alm->idArticulos > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="idArticulos" value="<?php echo $alm->__GET('idArticulos'); ?>" />
                    
                    <table >
                        <tr>
                            <th >Nombre</th>
                            <td><input type="text" name="Nombre" value="<?php echo $alm->__GET('Nombre'); ?>"  /></td>
                        </tr>
						<tr>
                            <th >Ubicacion</th>
                            <td><input type="text" name="Ubicacion" value="<?php echo $alm->__GET('Ubicacion'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >idProveedor</th>
                            <td><input type="text" name="idProveedor" value="<?php echo $alm->__GET('idProveedor'); ?>"  /></td>
                       
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
              </form>

              <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th bgcolor="#000000" >Nombre</th>
							<th bgcolor="#000000" >Ubicacion</th>
                            <th bgcolor="#000000" >idProveedor</th>
                            
                            <th bgcolor="#000000"></th>
                            <th bgcolor="#000000"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td bgcolor="#FFFFFF"><?php echo $r->__GET('Nombre'); ?></td>
							<td bgcolor="#FFFFFF"><?php echo $r->__GET('Ubicacion'); ?></td>
                            <td bgcolor="#FFFFFF"><?php echo $r->__GET('idProveedor'); ?></td>
                          
                            <td bgcolor="#000000">
                                <a href="?action=editar&idArticulos=<?php echo $r->idArticulos; ?>">Editar</a>
                            </td>
                            <td bgcolor="#000000">
                                <a href="?action=eliminar&idArticulos=<?php echo $r->idArticulos; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
              <a href="index.html"><img src="../imgproyecto/26723.png" width="256" height="256"></a>
              <p align="center">&nbsp;</p>     
              
            </div>
        </div>

    </body>
</html>



