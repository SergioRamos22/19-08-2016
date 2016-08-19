<?php

class AlumnoModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM articulos");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new articulos();

                $alm->__SET('idArticulos', $r->idArticulos);
                $alm->__SET('Nombre', $r->Nombre);
				  $alm->__SET('Ubicacion', $r->Ubicacion);
                $alm->__SET('idProveedor', $r->idProveedor);
             

                $result[] = $alm;
            }

            return $result;
	
			
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($idArticulos)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM articulos WHERE idArticulos = ?");
                      

            $stm->execute(array($idArticulos));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new articulos();

            $alm->__SET('idArticulos', $r->idArticulos);
            $alm->__SET('Nombre', $r->Nombre);
			$alm->__SET('Ubicacion', $r->Ubicacion);
            $alm->__SET('idProveedor', $r->idProveedor);
           

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($idArticulos)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM articulos WHERE idArticulos = ?");                      

            $stm->execute(array($idArticulos));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(articulos $data)
    {
        try 
        {
            $sql = "UPDATE articulos SET 
                        Nombre          = ?, 
						 Ubicacion          = ?,
                        idProveedor        = ?
                       
                    WHERE idArticulos = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('Nombre'), 
					  $data->__GET('Ubicacion'), 
                    $data->__GET('idProveedor'), 
                
                    $data->__GET('idArticulos')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(articulos $data)
    {
        try 
        {
        $sql = "INSERT INTO articulos (idArticulos, Nombre, Ubicacion,idProveedor) 
                VALUES (?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('idArticulos'), 
				$data->__GET('Nombre'), 
					$data->__GET('Ubicacion'), 
                $data->__GET('idProveedor'), 
                                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>

