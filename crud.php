
<?php



require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

$alm = new Crear_cuenta();
$model = new AlumnoModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
            $alm->__SET('Numero_documento',              $_REQUEST['Numero_documento']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Apellido',        $_REQUEST['Apellido']);
            $alm->__SET('Nombre_de_usuario',            $_REQUEST['Nombre_de_usuario']);
            $alm->__SET('Contrasenha', $_REQUEST['Contrasenha']);

            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.php');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('Numero_documento',          $_REQUEST['Numero_documento']);
			
			$alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Apellido',        $_REQUEST['Apellido']);
            $alm->__SET('Nombre_de_usuario',            $_REQUEST['Nombre_de_usuario']);
            $alm->__SET('Contrasenha', $_REQUEST['Contrasenha']);

            $model->Registrar($alm);
            echo "Guardo el Registro Exitosamente";

			//header('Location: index.html');
            //header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['Numero_documento']);
			echo "Elimino el Registro Exitosamente";

           // header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['Numero_documento']);
            break;
    }
}

?>