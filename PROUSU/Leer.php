<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new Crear_cuenta();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('Numero_documento',              $_REQUEST['Numero_documento']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Apellido',        $_REQUEST['Apellido']);
            $alm->__SET('Nombre_de_usuario',            $_REQUEST['Nombre_de_usuario']);
            $alm->__SET('Contrasenha', $_REQUEST['Contrasenha']);

            $model->Actualizar($alm);
            header('Location: index.php');
            break;

        case 'registrar':
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Apellido',        $_REQUEST['Apellido']);
            $alm->__SET('Nombre_de_usuario',            $_REQUEST['Nombre_de_usuario']);
            $alm->__SET('Contrasenha', $_REQUEST['Contrasenha']);

            $model->Registrar($alm);
            header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['Numero_documento']);
            header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['Numero_documento']);
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
	background-image: url(../imgproyecto/wallpaper-2k-natureza-2.jpg);
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
                            <th >Apellido</th>
                            <th >Nombre_de_usuario</th>
                            <th >Contrase&ntildea</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('Nombre'); ?></td>
                            <td><?php echo $r->__GET('Apellido'); ?></td>
                            <td><?php echo $r->__GET('Nombre_de_usuario'); ?></td>
                            <td><?php echo $r->__GET('Contrasenha'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <p>&nbsp;</p>     
              
            </div>
        </div>
        <p align="center">&nbsp;</p>
        <div align="center"><a href="index.html"><img src="../imgproyecto/26723.png" width="256" height="256"></a>
          
        </div>
    </body>
</html>



