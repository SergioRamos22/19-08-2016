<?php

class articulos
{
    private $idArticulos;
    private $Nombre;
	private $Ubicacion;
    private $idProveedor;
    

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
