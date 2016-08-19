
<?php



require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

$alm = new articulos();
$model = new AlumnoModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
            $alm->__SET('idArticulos',              $_REQUEST['idArticulos']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
			 $alm->__SET('Ubicacion',          $_REQUEST['Ubicacion']);
            $alm->__SET('idProveedor',        $_REQUEST['idProveedor']);
       

            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.php');
            
			break;

        case 'registrar':
            // se añadio
	  $alm->__SET('idArticulos',          $_REQUEST['idArticulos']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
			  $alm->__SET('Ubicacion',          $_REQUEST['Ubicacion']);
            $alm->__SET('idProveedor',        $_REQUEST['idProveedor']);

            $model->Registrar($alm);
            echo "Guardo el Registro Exitosamente";

			//header('Location: index.html');
            //header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idArticulos']);
			echo "Elimino el Registro Exitosamente";

           // header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idArticulos']);
            break;
    }
}

?>