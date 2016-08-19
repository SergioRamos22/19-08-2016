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
            $alm->__SET('idProveedor',        $_REQUEST['idProveedor']);

            $model->Actualizar($alm);
            header('Location: index.php');
            break;

        case 'registrar':
        
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('idProveedor',        $_REQUEST['idProveedor']);

            $model->Registrar($alm);
            header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idArticulos']);
            header('Location: index.php');
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
        <title>MOSTRAR DATOS</title>
        <link rel="icon" type="image/png" href="C:/wamp/www/PROYECTO/26723.png" />
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <style type="text/css">
        body {
	background-image: url(34440-1920x1200.jpg);
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
            

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th >Nombre</th>
                            <th >idProveedor</th>
                          
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('Nombre'); ?></td>
                            <td><?php echo $r->__GET('idProveedor'); ?></td>
                    
                        </tr>
                    <?php endforeach; ?>
                </table>
                <p>&nbsp;</p>     
              
            </div>
        </div>
        <p align="center">&nbsp;</p>
        <div align="center"><a href="index.html"><img src="26723.png" width="256" height="256"></a>
          
        </div>
    </body>
</html>



