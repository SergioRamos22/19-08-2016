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

            $stm = $this->pdo->prepare("SELECT * FROM crear_cuenta");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Crear_cuenta();

                $alm->__SET('Numero_documento', $r->Numero_documento);
                $alm->__SET('Nombre', $r->Nombre);
                $alm->__SET('Apellido', $r->Apellido);
                $alm->__SET('Nombre_de_usuario', $r->Nombre_de_usuario);
                $alm->__SET('Contrasenha', $r->Contrasenha);

                $result[] = $alm;
            }

            return $result;
			
				
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($Numero_documento)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM crear_cuenta WHERE Numero_documento = ?");
                      

            $stm->execute(array($Numero_documento));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new Crear_cuenta();

            $alm->__SET('Numero_documento', $r->Numero_documento);
            $alm->__SET('Nombre', $r->Nombre);
            $alm->__SET('Apellido', $r->Apellido);
            $alm->__SET('Nombre_de_usuario', $r->Nombre_de_usuario);
            $alm->__SET('Contrasenha', $r->Contrasenha);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($Numero_documento)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM crear_cuenta WHERE Numero_documento = ?");                      

            $stm->execute(array($Numero_documento));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Crear_cuenta $data)
    {
        try 
        {
            $sql = "UPDATE crear_cuenta SET 
                        Nombre          = ?, 
                        Apellido        = ?,
                        Nombre_de_usuario            = ?, 
                        Contrasenha = ?
                    WHERE Numero_documento = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('Nombre'), 
                    $data->__GET('Apellido'), 
                    $data->__GET('Nombre_de_usuario'),
                    $data->__GET('Contrasenha'),
                    $data->__GET('Numero_documento')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Crear_cuenta $data)
    {
        try 
        {
        $sql = "INSERT INTO crear_cuenta (Numero_documento, Nombre,Apellido,Nombre_de_usuario,Contrasenha) 
                VALUES (?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('Numero_documento'), 
				$data->__GET('Nombre'), 
                $data->__GET('Apellido'), 
                $data->__GET('Nombre_de_usuario'),
                $data->__GET('Contrasenha')
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>

