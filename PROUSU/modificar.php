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
            header('Location: modificar.php');
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
            header('Location: modificar.php');
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
        <title>MODIFICAR DATOS</title>
         <link rel="icon" type="image/png" href="C:/wamp/www/PROYECTO/26723.png" />
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <style type="text/css">
        body {
	background-image: url(../imgproyecto/fondos-de-pantalla-de-musica-mezcladora.jpg);
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
                
              <form action="?action=<?php echo $alm->Numero_documento > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="Numero_documento" value="<?php echo $alm->__GET('Numero_documento'); ?>" />
                    
                    <table >
                        <tr>
                            <th >Nombre</th>
                            <td><input type="text" name="Nombre" value="<?php echo $alm->__GET('Nombre'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Apellido</th>
                            <td><input type="text" name="Apellido" value="<?php echo $alm->__GET('Apellido'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Nombre_de_usuario</th>
                            <td><input type="text" name="Nombre_de_usuario" value="<?php echo $alm->__GET('Nombre_de_usuario'); ?>"  /></td>
                      
                        </tr>
                        <tr>
                            <th >Contrase&ntildea</th>
                            <td><input type="password" name="Contrasenha" value="<?php echo $alm->__GET('Contrasenha'); ?>"  /></td>
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
                            <th bgcolor="#000000" >Apellido</th>
                            <th bgcolor="#000000" >Nombre_de_usuario</th>
                            <th bgcolor="#000000" >Contrase&ntildea</th>
                            <th bgcolor="#000000"></th>
                            <th bgcolor="#000000"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td bgcolor="#000000"><?php echo $r->__GET('Nombre'); ?></td>
                            <td bgcolor="#000000"><?php echo $r->__GET('Apellido'); ?></td>
                            <td bgcolor="#000000"><?php echo $r->__GET('Nombre_de_usuario') ; ?></td>
                            <td bgcolor="#000000"><?php echo $r->__GET('Contrasenha'); ?></td>
                            <td bgcolor="#000000">
                                <a href="?action=editar&Numero_documento=<?php echo $r->Numero_documento; ?>">Editar</a>
                            </td>
                            <td bgcolor="#000000">
                                <a href="?action=eliminar&Numero_documento=<?php echo $r->Numero_documento; ?>">Eliminar</a>
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



