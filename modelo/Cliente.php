<?php
class Cliente{
    var $Id;
    var $Fecha;
    var $Nombre;
    var $Apellido;
    var $CodRe;
    function __construct($id,$fecha, $nombre,$apellido, $codre)
    {
        $this->id=$id;
        $this->fecha=$fecha;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->codre=$codre;
    }
    function setId($id) { $this->id = $id; }
    function getId() { return $this->codigo; }

    function setFecha($fecha) { $this->fecha = $fecha; }
    function getFecha() { return $this->fecha; }

    function setNombre($nombre) { $this->nombre = $nombre; }
    function getNombre() { return $this->nombre; }
    
    function setApellido($apellido) { $this->apellido = $apellido; }
    function getApellido() { return $this->apellido; }
    
    function setCodeRe($codre) { $this->codre = $codre; }
    function getCodeRe() { return $this->codre; }
}
?>