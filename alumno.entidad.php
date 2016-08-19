<?php

class Crear_cuenta
{
    private $Numero_documento;
    private $Nombre;
    private $Apellido;
    private $Nombre_de_usuario;
    private $Contrasenha;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
